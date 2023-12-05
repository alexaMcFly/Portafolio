/*
Autor: Alexa Jimena González Lucio
A01277701
Fecha 21 de septiembre 2023
*/
#include "CLista.h"
#include "queue.h"
#include "sorts.h"
#include <chrono>
#include <cstring>
#include <fstream>
#include <iomanip> // Necesario para std::setw
#include <iostream>
#include <string>
#include <thread>
#include <vector>

using namespace std;
// AVANCE 3------------------------------------------------------>
// Complejidad peor de los casos: O(n), n=tamaño del arreglo canciones
// Complejidad mejor de los casos: O(1), el archivo no se puede abrir ni crear
void escribirArchivo(lista &cancionesReproducidas,
                     const string &nombreArchivo) {
  fstream archivo(
      nombreArchivo,
      ios::in | ios::out |
          ios::app); // Abre el archivo en modo de lectura y escritura

  if (archivo.is_open()) {
    archivo.seekp(
        0, ios::end); // Posiciona el puntero de escritura al final del archivo

    if (archivo.tellp() != 0) { // Si el archivo no está vacío, agrega una línea
                                // nueva antes de los nuevos datos
      archivo << "\n";
    }

    archivo << "Canciones Reproducidas:\n";

    for (int i = 0; i < cancionesReproducidas.canciones.size(); i++) {
      archivo << cancionesReproducidas.canciones[i].nombre << " - "
              << cancionesReproducidas.canciones[i].autor << "\n";
    }

    cout << "Registro de canciones reproducidas guardado en " << nombreArchivo
         << endl;

    archivo.close();
  } else {
    cout
        << "No se pudo abrir el archivo para escribir el registro de canciones."
        << endl;
  }
}

void esperarMilisegundos(int milisegundos) { // Complejidad: O(1)
  this_thread::sleep_for(std::chrono::milliseconds(milisegundos));
}

// Complejidad: O(n) , n=tamaño del vector generos
void imprimeGeneros(vector<string> &generos) {
  for (int i = 0; i < generos.size(); i++) {
    cout << i << ". " << generos[i] << endl;
  }
}

// Complejidad: O(n) , n=tamaño del vector canciones del objeto lista
void reproduceLista(lista &listaReproduccion) {
  for (int i = 0; i < listaReproduccion.canciones.size(); i++) {
    cout << right << setw(35) << listaReproduccion.canciones[i].nombre << "- ";
    cout << left << setw(15) << listaReproduccion.canciones[i].autor << endl;
  }
}

// Complejidad: O(n) , n=tamaño del vector canciones de lista
// Esta funcion imprime las canciones con su duracion
void imprimeLista(lista &listaReproduccion) {
  for (int i = 0; i < listaReproduccion.canciones.size(); i++) {
    cout << right << setw(35) << listaReproduccion.canciones[i].nombre << "- ";
    cout << left << setw(15) << listaReproduccion.canciones[i].duracion << endl;
  }
}

// Complejidad: O(n) , n=tamaño del vector canciones de lista
lista ordenaPorGenero(lista listaCompleta, int seleccion,
                      vector<string> generos, Sorts sort) {
  int indice = 0;
  lista listaReproduccion;
  while (indice < listaCompleta.canciones.size()) {
    if (listaCompleta.canciones[indice].genero.compare(generos[seleccion]) ==
        0) {
      listaReproduccion.canciones.push_back(listaCompleta.canciones[indice]);
    }
    indice++;
  }
  // reproduceLista(listaReproduccion);//sí se imprime la lista correcta
  //sort.shellSort(listaReproduccion.canciones);
  // reproduceLista(listaReproduccion, 0);
  return listaReproduccion;
}

// Complejidad: O(n) , n=tamaño del vector canciones de lista
void llenaFila(lista &listaReproduccion, Queue<CCancion> &fila) {
  for (int i = 0; i < listaReproduccion.canciones.size(); i++) {
    CCancion miCancion;
    miCancion.nombre = listaReproduccion.canciones[i].nombre;
    miCancion.autor = listaReproduccion.canciones[i].autor;
    fila.enqueue(miCancion); // agregar una canción a la fila
  }
}

// Complejidad: O(n) , n=tamaño de la fila antes de comenzar a hacer dequeue
void imprimeFila(Queue<CCancion> &miFila, lista listaOriginal) {
  escribirArchivo(listaOriginal, "canciones_reproducidas.txt");
  CCancion reproducientoCancion;
  int sze = miFila.getSize();
  for (int i = 0; i < sze; i++) {
    if (!miFila.empty()) {
      reproducientoCancion = miFila.front();
      miFila.dequeue(); // eliminar primer elemento
      cout << "Reproduciendo: " << right << setw(35)
           << reproducientoCancion.nombre;
      cout << " --- " << reproducientoCancion.autor << left << setw(15)
           << " ..." << endl
           << endl;
      esperarMilisegundos(2000);
    } else
      i = miFila.getSize();
  }
  // Escribir el registro de canciones en un archivo de texto
}

// Complejidad: O(1)
// me falta terminar la implementacion de esta funcion
void menu() {
  cout << "Elige una opción"
       << ":" << endl;
  cout << "1. Reproducir lista" << endl;
  cout << "2. Reproducir por género" << endl;
  cout << "3. Crear lista" << endl;
  cout << "4. Modifica lista" << endl;
  cout << "5. Salir" << endl;
}

// Complejidad: O(1)
void subMenu(int eleccion, lista &listaNueva) {
  if (eleccion == 1) {
    // Desplegar las listas disponibles5
    cout << "Listas disponibles:" << endl;
  } else if (eleccion == 2) {
    cout << "Generos disponibles:" << endl;
    // Desplegar los generos disponibles
  } else if (eleccion == 3) {
    cout << "Ingresa el nombre de la lista:" << endl;
    cin >> listaNueva.nombre;
    // ABRIR  EL ARCHIVO EN MODO DE ESCRITURA
    ofstream archivo("mi_archivo.txt");
    if (!archivo)
      cout << "No se pudo abrir el archivo." << endl;
    else {
      cout << "Elige las canciones que quieres agregar" << endl
           << "Presiona el número de la canción deseada:" << endl
           << endl;
      // imprimir canciones por género
    }

  } else if (eleccion == 4) {
    cout << "Presiona 1 para AGREGAR UNA CANCIÓN o 2 para ELIMINARLA:" << endl;
  } else if (eleccion == 5) {
    cout << "SESIÓN FINALIZADA" << endl;
  }
}

// Complejidad peor de los casos: O(n) puesto que la función más compleja que se
// usa es O(n) Complejidad en el mejor de los casos: O(1), puesto que si no se
// logra lleer el archivo el programa no se ejecuta
int main() {
  int seleccion = 0;     // indice del genero a elegir por el usuario
  lista miLista;         // objeto lista usado durante el programa
  lista miListaOrdenada; // objeto lista usado para ordenamiento
  Sorts sort;
  ifstream archivo("datos.txt"); // abre el archivo

  if (!archivo) {
    cout << "No se pudo abrir el archivo." << endl;
  } else {
    string linea;
    CCancion miCancion;
    vector<string> generos;
    generos.push_back("Pop");
    generos.push_back("Clásica");
    generos.push_back("Rock-Español");
    generos.push_back("Rock");
    int g_counter = -1;

    // O(n), n= cantidad de caracteres de datos.txt
    while (getline(archivo, linea)) {
      if (linea.empty()) {
        getline(archivo, linea); // ignorar una line1a
        g_counter++;
        continue;
      }

      for (int i = 0; i < linea.length(); i++) {
        if (linea[i] == '-') {
          for (int j = i + 1; j < linea.length(); j++) {
            if (linea[j] == '-') {
              miCancion.nombre = linea.substr(0, i + 1);
              miCancion.autor = linea.substr(i + 1, j - i - 1);
              miCancion.genero = generos[g_counter];
              string dur = linea.substr(j + 1, linea.length() - j - 1);
              miCancion.duracion = stoi(dur);
              break;
            }
          }
        }
      }
      miLista.canciones.push_back(miCancion);
    }

    archivo.close(); // Cierra el archivo
    miListaOrdenada = miLista;
    sort.ordenaMerge(miListaOrdenada.canciones);

    // imprimir las canciones del vector ordenado
    cout << "El orden de todas las canciones de acuerdo a su duracion en "
            "segundos es: "
         << endl
         << endl;
    int modo = 0;
    imprimeLista(miListaOrdenada);

    cout << endl;

    int respuesta = 1;
    while (respuesta == 1) {
      cout << "Elige un género musical para crear una lista de reproduccion: "
           << endl;
      imprimeGeneros(generos);
      cin >> seleccion;
      cout << seleccion << endl;
      lista listaGenero = ordenaPorGenero(miLista, seleccion, generos, sort);
      reproduceLista(listaGenero);
      // AVANCE 2------------------------------------------------------>
      //  Reproducir una lista
      cout << "Elige la lista que quieras reproducir :" << endl;
      imprimeGeneros(generos);
      cin >> seleccion;
      // creación de una lista en una fila
      QueueVector<CCancion> miFila(miLista.canciones.size());
      // cambiar el valor de la variable modo para el modo de reproduccion
      lista listaGeneroFila;
      listaGeneroFila = ordenaPorGenero(miLista, seleccion, generos, sort);
      llenaFila(listaGeneroFila, miFila);
      imprimeFila(miFila, listaGeneroFila); // se reproduce la lista
      cout << "Quieres salir del programa?...." << endl;
      cout << "1.No" << endl;
      cout << "2.Si" << endl;
      cin >> respuesta;
      if (respuesta == 1) {
        respuesta = 1;
      } else {
        respuesta = 0;
        cout << "Bye";
      }
    }
  }
}
