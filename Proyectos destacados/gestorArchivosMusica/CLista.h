#pragma once
#include <cstring>
#include <fstream>
#include <iostream>
#include <string>
#include <vector>

using namespace std;

class CCancion {
public:
  CCancion();
  string nombre;
  string autor;
  string genero;
  string lanzamiento; // año de publicación
  string album;
  int duracion; // duracion en min

  CCancion &operator=(const CCancion &);
};

CCancion::CCancion() {
  nombre = "";
  autor = "";
  genero = "";
  lanzamiento = "";
  album = "";
  duracion = 0;
}

class lista {
public:
  lista() { nombre = ""; }
  string nombre;
  vector<CCancion> canciones;
  lista &operator=(const lista &);
};

CCancion &CCancion::operator=(const CCancion &other) {
  if (this != &other) { // Verifica que no estés asignando a sí mismo
    nombre = other.nombre;
    autor = other.autor;
    genero = other.genero;
    lanzamiento = other.lanzamiento;
    album = other.album;
    duracion = other.duracion;
  }
  return *this;
}

lista &lista::operator=(const lista &other) {
  if (this != &other) { // Verifica que no estés asignando a sí mismo
    nombre = other.nombre;
    canciones = other.canciones;
  }
  return *this;
}