A veces es imposible borrar una carpeta o unos archivos del servidor, sobre todo si hemos borrado una instalación de Drupal o Joomla. Para conseguirlo debemos ejecutar este script de php

Donde pone folder name escribimos la carpeta que queremos borrar. Al ejecutarlo le dará unos permisos 0777, que extrañamente si dejarán ahora borrar la carpeta desde filezilla o filemanager.

Ahora para ejecutarlo, si nuestro sitio se llama nuestrositio.com, tenemos que escribir en la barra de direcciones: nuestrositio.com/1.php y pulsamos enter. No se verá nada pero ya se ha ejecutado el script. Al poner ahora la carpeta sites con permisos 777 e intentarla borrar nos dejará.