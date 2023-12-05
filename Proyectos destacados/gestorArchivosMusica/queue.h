/*
 * queue.h
 *
 *  Created on: 16/10/2023
 *      Author:  Alexa Jimena González Lucio
 */

#ifndef QUEUE_H_
#define QUEUE_H_

#include "exception.h"
#include <iostream>
#include <list>
#include <sstream>
#include <string>

template <class T> class Queue;

template <class T> class QueueVector : public Queue<T> {
private:
  T *data;
  int head, tail, size, counter;

public:
  QueueVector(int);
  ~QueueVector();
  void enqueue(T);
  void dequeue();
  T front() const;
  bool empty() const;
  bool full() const;
  void clear();
  int getSize();
};

template <class T> class Queue {
public:
  virtual void enqueue(T) = 0;
  virtual void dequeue() = 0;
  virtual T front() const = 0;
  virtual bool empty() const = 0;
  virtual void clear() = 0;
  virtual int getSize() = 0;
  friend class QueueVector<T>;
};

template <class T> QueueVector<T>::QueueVector(int sze) {
  data = new T[sze];
  if (data == NULL) {
    throw OutOfMemory();
  }
  size = sze;
  head = 0;
  tail = 0;
  counter = 0;
}

template <class T> QueueVector<T>::~QueueVector() { clear(); }

template <class T> int QueueVector<T>::getSize() { return size; }

template <class T> bool QueueVector<T>::empty() const {
  return (counter == 0) ? true : false;
}

template <class T> bool QueueVector<T>::full() const {
  return (counter == size) ? true : false;
}

template <class T> void QueueVector<T>::enqueue(T val) {
  if (full()) {
    throw Overflow();
  }
  data[tail] = val;
  tail = (tail + 1) % size;
  counter++;
}

template <class T> T QueueVector<T>::front() const {
  T aux;

  if (empty()) {
    throw NoSuchElement();
  }

  aux = data[head];

  return aux;
}

template <class T>
void QueueVector<T>::dequeue() { // METODO PARA REPRODUCIR UNA FILA

  if (empty()) {
    throw NoSuchElement();
  }
  head = (head + 1) % size;
  counter--;
}

template <class T> void QueueVector<T>::clear() {
  tail = 0;
  head = 0;
  counter = 0;
}

template <class T> class QueueList : public Queue<T> {
private:
  std::list<T> data;

public:
  void enqueue(T);
  void dequeue();
  T front() const;
  bool empty() const;
  void clear();
  std::string toString() const;
};

template <class T> void QueueList<T>::enqueue(T val) { data.push_back(val); }

template <class T> T QueueList<T>::front() const {
  T aux;

  if (empty()) {
    throw NoSuchElement();
  }

  aux = data.front();

  return aux;
}

template <class T> void QueueList<T>::dequeue() {
  if (empty()) {
    throw NoSuchElement();
  }

  data.pop_front();
}

template <class T> bool QueueList<T>::empty() const {
  return (data.empty()) ? true : false;
}

template <class T> void QueueList<T>::clear() { data.clear(); }

template <class T> std::string QueueList<T>::toString() const {
  std::stringstream aux;
  typename std::list<T>::const_iterator itr = data.begin();

  aux << "[";
  if (!data.empty()) {
    aux << (*itr);
    itr++;
    while (itr != data.end()) {
      aux << ", " << (*itr);
      itr++;
    }
  }
  aux << "]";
  return aux.str();
}

#endif /* QUEUE_H_ */
