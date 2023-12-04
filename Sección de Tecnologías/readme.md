# Proyecto: Gestor de archivos de música
Este proyecto gestiona datos de archivos de canciones e implementa funciones eficientes de búsqueda por filtros e inserción de datos, además del ordenamiento con métodos adecuados en la presentación de los datos. En este avance se implementa la parte de los métodos de ordenamiento en el proyecto.

## Descripción del avance 1
Se implementan métodos de ordenamiento adecuados para los datos que se manejarán en el proyecto, en este caso, nombres de canciones, autor y duración.

## Descripción del avance 2
Se implementa la estructura de datos Queue o fila, para reproducir una lista de canciones que se ordena de forma alfabética de forma previa. 


### Cambios sobre el primer avance
1. Cambio 1: Corregí el ordenamiento de las canciones, pues se generaba un desfase entre los datos, ya que solo se estaba cambiando de lugar el dato de la duración de cada canción y no se ordenaban los nombres, autores y generos en conjunto.

## Descripción del avance 3
Limpieza del código mediante la creación de funciones para cada parte del programa con el propósito de realizar un análisis algorítmico del mismo. 

### Cambios sobre el segundo avance
Cree funciones para cada parte del programa, dejando en la función main() solamente las llamadas según la función que se necesita ejecutar

## Instrucciones para compilar el avance de proyecto
Presiona el botón "Run" para compilar y ejecutar

## Instrucciones para ejecutar el avance de proyecto
Presiona el botón "Run" para compilar y ejecutar

## Descripción de las entradas del avance de proyecto
Se requiere como entrada un archivo de texto(.txt) que contenga en cada línea el nombre de la canción, autor y duración en minutos, datos que deben estar separados por un "-". Ejemplo: Sweet Child´o Mine-Guns´n Roses-356.

## Descripción de las salidas del avance de proyecto
Como salidas, el archivo despliega el orden ascendente de las canciones por duracion en consola, además de darle la opcion al usuario de ordenar alfabéticamente las canciones de cada género. 

## Desarrollo de competencias

### SICT0301: Evalúa los componentes
#### Hace un análisis de complejidad correcto y completo para los algoritmos de ordenamiento usados en el programa.
El algoritmo de merge sort usado para ordenar una lista larga(el total de canciones de acuerdo a su duración), tiene una complejidad de O(n log(n)) para todos los casos, lo cual hace que sea un algoritmo muy confiable y estable en su rendimiento, así que al usarlo no hay que preocuparse por el tiempo de ejecución. Merge sort usa espacio adicional en memorial, pero al no tener limitaciones de este recurso, es un algortimo perfecto para la ocasión. 

Cabe mencionar que a comparación de Quicksort, un método que suele ser ligeramente más rápito, merge sort tiene un mejor rendimiento mucho mejor en el peor de los casos.

Por otro lado, shell sort tiene una complejidad de Θ(n(log(n))^2) en el caso promedio y el peor de los casos, mientras que su complejidad para el mejor de los casos es Ω(n log(n)).
Es un poco menos fácil de implementar que otros algoritmos de complejidad cuadrática como bubble sort y selection sort, pero su tiempo de ejecución en el peor de los casos es significativamente menor.

#### Hace un análisis de complejidad correcto y completo de todas las estructuras de datos y cada uno de sus usos en el programa.
La complejidad para la creación de la fila que hago cuando el usuario selecciona el género que quiere reproducir es O(n). Ya que por elemplo si la lista que el usuario quiere reproducir tiene 10 canciones, debo agregar 10 elementos a la fila. 

Para la reproducción de la fila aplica lo mismo, me tomará tantas operaciones como canciones tenga la fila para eliminarlas y mostrarlas en pantalla. 
Por otro lado, acceder a la información en la lista de reproducción tiene una complejidad de O(1), pues solamente necesito acceder al primer elemento de la fila.

#### Hace un análisis de complejidad correcto y completo para todos los demás componentes del programa y determina la complejidad final del programa.
Para lograr esta competencia determiné la complejidad temporal algoritmica de cada función de mi programa en el peor de los casos y de acuerdo a las convenciones de la notación Big(O), consideré como complejidad final de mi programa a la función más compleja que se llega a utilizar, en este caso es el método de ordenamiento shellSort, por lo que la complejidad final para el peor de los casos es  Θ(n(log(n))^2) .

En cambio para el mejor de los casos.

### SICT0302: Toma decisiones
#### Selecciona un algoritmo de ordenamiento adecuado al problema y lo usa correctamente.
Seleccioné el algoritmo de Merge Sort para ordenar todas las canciones del archivo(se consideran 1000 elementos aproximadamente), ya que el algoritmo de Merge Sort es de los más eficientes para ordenar grandes cantidades de datos. Además, merge sort es un algoritmo estable, lo que quiere decir que durante el proceso de ordenamiento, los datos que ya se encuentran ordenados, no se desordenan en el proceso del algoritmo, cosa que hace a merge sort aún más eficiente.

Por otro lado, decidí usar el método shell sort para ordenar elementos de una lista de reproduccion en específico, considerando que una lista de reproducción tendrá de 20-100 elementos. Shell sort tiene un rendimiento eficiente para ordenar listas pequeñas y su implementación es mucho más sencilla. Por lo cual, a pesar de no ser un método estable como lo es merge sort, considero que shell sort es una buena opcion para listas con esta cantidad de elementos. 

#### Selecciona una estructura de datos adecuada al problema y la usa correctamente.
Elegí usar una fila (Queue) para reproducir una lista de canciones en mi programa. El proceso consiste en ordenar las canciones de un género o lista de reproducción dentro de un vector de canciones para posteriormente agregarlas a una fila en ese orden. Finalmente, las canciones se reproducen, en donde la primera canción en reproducirse es la primera canción que fue agregada. La fila cuenta con los métodos enqueue y dequeue, el primero sirve para agregar canciones al final de la fila y el segundo para eliminar las que están al principio de la fila

### SICT0303: Implementa acciones científicas
#### Implementa mecanismos para consultar información de las estructras correctos.
La forma en la que consulto imformación en mi programa es usando el método front, el cual devuelve el primer elemento de la fila en cuestion. En este caso, lo usé para mostrar las canciones de la fila de reproducción en la consola cada vez que acababa de reproducirse una canción de la fila. Posteriormente se elimina el primer elemento de la fila y se consultaba el nuevo elemento con la fila actualizada.

### Implementa mecanismos de lectura de archivos para cargar datos a las estructuras de manera correcta.
El mecanismo de lectura de archivos en mi proyecto es con la libreria iostream de c, de forma que con fines de practicidad se lee línea por línea el contenido del archivo y usando como guía el formato específico del archivo , se procesan las canciones y sus datos para construir los objetos correspondientes a las listas de reproduccion y las canciones. Posteriormente se agregan los objetos canciones a la fila de reproducción que el usuario desee.


### Implementa mecanismos de escritura de archivos para guardar los datos  de las estructuras de manera correcta
Para implementar la escritura de archivos en mi programa, usé la función ofstream para generar un historial de las canciones que un usuario reproduce en cada sesión. Hasta el momento, el archivo se renueva cada vez que el programa se ejecuta. Se escribirán las canciones que el usuario reproduzca, no las de las listas de reproducción que cree durante la ejecución. Este mecanismo funciona como un historial de reproducción.