# Academia de Conducir – Volante Seguro

## Descripción del proyecto
Este proyecto es un sistema web desarrollado en Laravel que permite gestionar
el registro y seguimiento de alumnos de una academia de conducir.
El sistema reemplaza el registro manual en libros físicos por una solución digital,
ordenada y accesible desde computadora y dispositivos móviles.

---

## Caso de estudio
Cliente: Escuela de Conducir “Volante Seguro”  
Usuario: Instructor José (director)

El sistema permite registrar alumnos con sus datos personales y académicos,
controlar su estado dentro del proceso de aprendizaje y mantener un historial
por motivos legales.

---

## Objetivo
Desarrollar un CRUD completo en Laravel aplicando el patrón MVC, que permita:
- Registrar alumnos
- Visualizar el listado
- Editar información
- Eliminar alumnos de forma lógica
- Usar el sistema desde dispositivos móviles

---

## Decisiones de diseño

### Entidad principal
Alumno

### Tabla utilizada
alumnos

### Campos de la tabla
- id
- nombre_completo
- cedula
- telefono
- tipo_licencia
- estado
- created_at
- updated_at
- deleted_at

---

## Estados del alumno
- Inscrito
- Clases teóricas
- Practicando
- Aprobó

---

## Política de eliminación
No se elimina información de forma física.
Se utiliza eliminación lógica (Soft Deletes) para conservar los datos
por motivos legales y administrativos.

---

## Funcionalidades implementadas
- Registro de alumnos
- Validaciones de datos
- Listado de alumnos
- Edición de información
- Eliminación lógica
- Interfaz responsive con Bootstrap

---

## Tecnologías utilizadas
- Laravel
- PHP
- PostgreSQL
- Bootstrap
- Git y GitHub

---

## Evidencias
Las capturas de pantalla del sistema se encuentran en la carpeta:

/capturas

Incluyen:
- Listado de alumnos
- Formulario de registro
- Vista móvil del sistema

---

## Repositorio
https://github.com/floressemily/volante-seguro
