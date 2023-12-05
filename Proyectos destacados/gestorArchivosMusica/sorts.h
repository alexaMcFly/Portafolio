#pragma once
/*
 * sorts.h
 *
 *  Created on: 21/09/2023
 *      Author: Alexa Jimena González Lucio
 */
#include "CLista.h"
#include <iostream>
#include <vector>
using namespace std;

class Sorts {
private:
  void swap(vector<CCancion> &, int i, int j);
  void mergeSplit(vector<CCancion> &, vector<CCancion> &, int, int);
  void copyArray(vector<CCancion> &, vector<CCancion> &, int, int);
  void mergeArray(vector<CCancion> &, vector<CCancion> &, int, int, int);

public:
  void shellSort(vector<CCancion> &);
  void ordenaMerge(vector<CCancion> &);
};

void Sorts::swap(vector<CCancion> &v, int i, int j) {
  string aux = v[i].nombre;
  v[i].nombre = v[j].nombre;
  v[j].nombre = aux;
  aux = v[i].autor;
  v[i].autor = v[j].autor;
  v[j].autor = aux;
  aux = v[i].genero;
  v[i].genero = v[j].genero;
  v[j].genero = aux;
  int aux2 = v[i].duracion;
  v[i].duracion = v[j].duracion;
  v[j].duracion = aux2;
}

void Sorts::shellSort(vector<CCancion> &source) {
  int h = (source.size() - 1) / 2;
  int puntero = h;
  int piv = 0;

  while (h >= 1) {
    while (puntero <= source.size() - 1) {
      //>
      if (source[piv].nombre.compare(source[puntero].nombre) > 0) {
        swap(source, piv, puntero);
      }

      while (source[piv - 1].nombre.compare(source[puntero - 1].nombre) > 0 &&
             h == 1) {
        piv--;
        puntero--;
        swap(source, piv, puntero);
      }
      piv++;
      puntero++;
    }//aquí ya no está llegando
    h /= 2;
    piv = 0;
    puntero = h;
  }
}

void Sorts::copyArray(vector<CCancion> &A, vector<CCancion> &B, int low,
                      int high) {
  for (int i = low; i <= high; i++) {
    A[i].duracion = B[i].duracion;
    A[i].nombre = B[i].nombre;
    A[i].autor = B[i].autor;
    A[i].genero = B[i].genero;
  }
}

void Sorts::mergeArray(vector<CCancion> &A, vector<CCancion> &B, int low,
                       int mid, int high) {

  if (low >= 0 && low < A.size() && mid >= 0 && mid < A.size() && high >= 0 &&
      high < A.size()) {
    int pos_1a_parte = low;
    int fin_1a_parte = mid;
    int pos_2da_parte = mid + 1;
    int fin_2da_parte = high;

    for (int i = pos_1a_parte; i <= fin_2da_parte; i++) {
      if ((A[pos_1a_parte].duracion < A[pos_2da_parte].duracion &&
           pos_1a_parte <= fin_1a_parte) ||
          pos_2da_parte > fin_2da_parte) {
        B[i].duracion = A[pos_1a_parte].duracion;
        B[i].genero = A[pos_1a_parte].genero;
        B[i].nombre = A[pos_1a_parte].nombre;
        B[i].autor = A[pos_1a_parte].autor;
        pos_1a_parte++;
      } else {
        B[i].duracion = A[pos_2da_parte].duracion;
        B[i].genero = A[pos_2da_parte].genero;
        B[i].nombre = A[pos_2da_parte].nombre;
        B[i].autor = A[pos_2da_parte].autor;
        pos_2da_parte++;
      }
    }

    copyArray(A, B, low, high);
  }
}
int cuenta = 0;
void Sorts::mergeSplit(vector<CCancion> &A, vector<CCancion> &B, int low,
                       int high) {
  if (high > low) {
    int mid = low + (high - low) / 2;
    // int mid = (low + high) / 2;
    mergeSplit(A, B, low, mid);
    mergeSplit(A, B, mid + 1, high);
    mergeArray(A, B, low, mid, high);
  }
}

void Sorts::ordenaMerge(vector<CCancion> &v) {
  if (v.empty()) {
    return; // No hagas nada si el vector está vacío.
  }
  vector<CCancion> tmp(v.size());
  mergeSplit(v, tmp, 0, v.size() - 1);
}
