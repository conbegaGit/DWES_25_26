# Cambios Realizados en Módulo de Empleados

## Explicación Simple (Para Tontos)

### Lo que hice básicamente:

**Antes**: Cuando ibas a la lista de empleados, solo veías TODOS los empleados. No había forma de buscar.

**Ahora**: Agregué 3 cosas debajo del botón "Nuevo empleado":

#### 1️⃣ **Una caja para escribir un nombre**
   - Escribes parte del nombre (ejemplo: "Juan")
   - Te muestra solo empleados que contengan "Juan"

#### 2️⃣ **Una lista desplegable de departamentos**
   - Clickeas y aparecen todos los departamentos
   - Seleccionas uno y te filtra empleados de ese depto

#### 3️⃣ **Dos botones**
   - **Buscar**: Aplica los filtros que escribiste
   - **Limpiar**: Borra todo y te muestra nuevamente todos los empleados

---

### ¿Cómo funciona técnicamente?

**Fórmula simple:**
```
Si escribo "Juan" y selecciono "Ventas" y hago click en Buscar
   ↓
La página me muestra SOLO empleados llamados Juan que trabajan en Ventas
```

**El código hace esto:**
1. Lee lo que escribiste en el nombre
2. Lee qué departamento seleccionaste
3. Pregunta a la base de datos: "Dame empleados que coincidan con esto"
4. Te muestra solo los resultados

---

### El "problema que arreglé"

Había un error cuando buscabas. El código concatenaba mal el SQL (es como pegar palabras mal en una frase). 

**Lo solucione así:**
- **Antes**: Era como decir "Me gusta Juan Jeffrey's pizza" (mal colocadas las comillas)
- **Ahora**: Se lo digo de forma ordenada y segura a la base de datos

---

**En resumen: Agregué un buscador que funciona como los buscadores de Google, pero para empleados.** 🔍

---

## Explicación Técnica del Código

### 1. ¿Cómo recibimos lo que el usuario escribe?

```php
$filtroNombre = $_GET['nombre'] ?? '';
$filtroDept = $_GET['departamento'] ?? '';
```

**¿Por qué `$_GET`?**
- Cuando el usuario hace click en "Buscar", el formulario envía los datos por URL
- Los datos llegan así: `listar.php?nombre=Juan&departamento=4`
- `$_GET` lee esos datos de la URL
- `?? ''` significa: "Si no hay dato, deja vacío"

**Ejemplo:**
```
Usuario escribe: "Juan" y selecciona "Ventas (ID 4)"
   ↓
URL: listar.php?nombre=Juan&departamento=4
   ↓
$filtroNombre = "Juan"
$filtroDept = "4"
```

---

### 2. ¿Cómo construimos la consulta SQL que CAMBIA según los filtros?

**Paso 1: Empezamos con una consulta base**
```php
$sql = "SELECT e.*, d.Nombre AS DeptNombre 
        FROM empleados e 
        LEFT JOIN departamentos d ON e.Departamento = d.CodDept 
        WHERE 1=1";
```

**¿Por qué `WHERE 1=1`?**
- Es un truco para poder agregar filtros dinámicamente
- `1=1` siempre es verdadero, así que muestra todo por defecto
- Luego agregamos `AND` si hay filtros

**Paso 2: Si el usuario escribió un nombre, lo agregamos**
```php
if (!empty($filtroNombre)) {
    $sql .= " AND e.Nombre LIKE ?";
    $params[] = "%" . $filtroNombre . "%";
}
```

**¿Qué pasa aquí?**
- Si el usuario escribió algo en "Nombre"
- Agregamos a la consulta: `AND e.Nombre LIKE ?`
- El `?` es un **placeholder** (un sitio vacío)
- `"%" . $filtroNombre . "%"` significa: busca el nombre EN CUALQUIER PARTE
  - Ejemplo: Si escribes "uan", encuentra "Juan", "Juanito", etc.

**Paso 3: Si seleccionó un departamento, lo agregamos**
```php
if (!empty($filtroDept)) {
    $sql .= " AND e.Departamento = ?";
    $params[] = $filtroDept;
}
```

**¿Qué pasa aquí?**
- Si seleccionó un departamento (no "Todos")
- Agregamos: `AND e.Departamento = ?`
- Busca empleados cuyo departamento EXACTO coincida

**Paso 4: Terminamos la consulta**
```php
$sql .= " ORDER BY e.CodEmple";
```

---

### 3. ¿Por qué usamos PREPARED STATEMENTS? (Lo más importante)

**ANTES (INSEGURO) ❌**
```php
$sql .= " AND e.Nombre LIKE '%" . $bd->quote($filtroNombre) . "%'";
```

**PROBLEMA:**
- Si alguien escribe: `') OR ('1'='1`
- La consulta se vuelve: `... LIKE '%') OR ('1'='1%'`
- **¡Acceso a todos los datos sin que debería!**
- También causaba errores de comillas duplicadas

**AHORA (SEGURO) ✅**
```php
$sql .= " AND e.Nombre LIKE ?";
$params[] = "%" . $filtroNombre . "%";
```

**VENTAJA:**
- El `?` es un placeholder que se llena DESPUÉS
- El usuario NO puede insertar código SQL
- Es imposible que cause errores de sintaxis
- MySQL trata el valor como un DATO, no como código

---

### 4. ¿Cómo ejecutamos la consulta?

**ANTES (INSEGURO) ❌**
```php
$stm = $bd->query($sql);  // Ejecuta directamente
```

**AHORA (SEGURO) ✅**
```php
$stm = $bd->prepare($sql);    // Prepara la consulta con placeholders
$stm->execute($params);        // Llena los placeholders con valores seguros
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);  // Obtiene los resultados
```

**¿Por qué en dos pasos?**
1. **Prepare**: Dice a SQL "prepárate para recibir valores"
2. **Execute**: Introduce los valores de forma segura

**Ejemplo real:**
```php
// Preparamos:
$sql = "SELECT * FROM empleados WHERE 1=1 AND e.Nombre LIKE ? AND e.Departamento = ?"

// Ejecutamos con valores:
$params = ["%Juan%", "4"]

// SQL se convierte en:
// SELECT * FROM empleados WHERE 1=1 AND e.Nombre LIKE '%Juan%' AND e.Departamento = '4'
```

---

### 5. ¿Cómo se muestra en el HTML?

```php
<form method="get" ...>
    <input type="text" name="nombre" value="<?= htmlspecialchars($filtroNombre) ?>">
    <select name="departamento">
        <option value="<?= $dept['CodDept'] ?>" <?= $filtroDept == $dept['CodDept'] ? 'selected' : '' ?>>
```

**¿Qué sucede?**
- El formulario usa `method="get"` → datos van por URL
- El valor guardado en el input es `$filtroNombre` → se mantiene lo que escribió
- El departamento seleccionado usa `selected` → mantiene la opción elegida
- El botón "Limpiar" va a `listar.php` sin parámetros → borra filtros

---

### 6. Resumen del Flujo Completo

```
Usuario escribe "Juan" y selecciona "Ventas" y clickea "Buscar"
   ↓
Formulario envía: ?nombre=Juan&departamento=4
   ↓
PHP recibe con $_GET
   ↓
Construye SQL dinámicamente:
   "SELECT ... WHERE 1=1 
    AND e.Nombre LIKE ? 
    AND e.Departamento = ?"
   ↓
Prepare + Execute con valores seguros
   ↓
Base de datos devuelve empleados que coinciden
   ↓
Se muestran en la tabla
```

---



### Cambios Implementados

#### 1. Formulario de Búsqueda
Se agregó un formulario de búsqueda avanzada debajo del botón "Nuevo empleado" con los siguientes campos:
- **Campo de Nombre**: Búsqueda de empleados por nombre (búsqueda parcial)
- **Desplegable de Departamento**: Filtro por departamento con opción "Todos"
- **Botón Buscar**: Aplica los filtros especificados
- **Botón Limpiar**: Limpia todos los filtros y vuelve a la vista inicial

#### 2. Mejoras de Diseño y Alineación
El formulario cuenta con:
- Labels encima de cada campo de entrada
- Inputs y select con ancho 100% del contenedor
- Estilos CSS integrados:
  - Fondo gris claro (#f5f5f5)
  - Bordes redondeados
  - Espaciado uniforme entre elementos
  - Alineación vertical consistente
- Botones alineados a la derecha con altura fija

#### 3. Lógica de Filtrado en Backend
Se implementó la lógica de filtrado con las siguientes características:

**Parámetros de Búsqueda:**
```php
$filtroNombre = $_GET['nombre'] ?? '';
$filtroDept = $_GET['departamento'] ?? '';
```

**Consulta SQL Dinámica:**
- Se utiliza el método GET para pasar los parámetros por URL
- La búsqueda por nombre usa `LIKE` para búsqueda parcial
- La búsqueda por departamento es exacta
- Los filtros se aplican dinámicamente a la consulta SQL

**Consulta Base:**
```sql
SELECT e.*, d.Nombre AS DeptNombre 
FROM empleados e 
LEFT JOIN departamentos d ON e.Departamento = d.CodDept 
WHERE 1=1
```

#### 4. Seguridad: Prepared Statements
Se reemplazó la concatenación directa de SQL por **prepared statements** con placeholders:

**Antes (Inseguro):**
```php
$sql .= " AND e.Nombre LIKE '%" . $bd->quote($filtroNombre) . "%'";
```

**Después (Seguro):**
```php
$sql .= " AND e.Nombre LIKE ?";
$params[] = "%" . $filtroNombre . "%";
```

**Ejecución:**
```php
$stm = $bd->prepare($sql);
$stm->execute($params);
```

### Ventajas de los Cambios

✓ **Funcionalidad Mejorada**: Búsqueda y filtrado de empleados
✓ **Mejor UX**: Interfaz intuitiva y clara
✓ **Seguridad**: Protección contra inyecciones SQL usando prepared statements
✓ **Mantenibilidad**: Código limpio y bien estructurado
✓ **Performance**: Consultas optimizadas

### Funcionalidades

1. **Búsqueda por Nombre**: Busca empleados cuyo nombre contenga el texto ingresado (case-insensitive)
2. **Filtro por Departamento**: Filtra empleados por departamento específico
3. **Combinación de Filtros**: Permite combinar búsqueda por nombre Y departamento
4. **Limpiar Filtros**: El botón "Limpiar" redirige a la página sin parámetros

### Errores Corregidos

- **Error SQL**: Se corrigió error de sintaxis SQL causado por comillas mal colocadas
- Implementación de prepared statements para evitar problemas de escape de caracteres

---
**Fecha**: 18 de febrero de 2026
**Rama**: DCB
