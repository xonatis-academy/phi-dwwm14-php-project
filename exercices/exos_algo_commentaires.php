<?php

/* Question 1 : Echanger les valeurs de 2 variables R et Q
R <- 5
Q <- 34 
*/

/* 
ALGO
A <- R
R <- Q
Q <- A
*/

############################################################

/* Question 2 : Echanger les valeurs de 3 variables R, Q et V. Dans V, mettre Q, dans Q, mettre R et dans R, mettre V.
```
R <- 5
Q <- 34
V <- 45 
*/

/* 
ALGO
A <- V
V <- Q
Q <- R
R <- A
*/

############################################################
/*
Question 3 : Vérifier si un utilisateur est majeur grâce à son âge. Mettre une variable `resultat` à `Vrai` si cela est le cas, sinon mettez la à `Faux`.
age <- 25
*/

/*ALGO
Méthode 1
---------
@Si age >= 18
    @DebutBloc
        resultat <- Vrai
    @FinBloc
@Sinon
    @DebutBloc
        resultat <- Faux
    @FinBloc
    

Méthode 2
---------
resultat <- Faux
@Si age >= 18
    @DebutBloc
        resultat <- Vrai
    @FinBloc*/

############################################################
/*
Question 4 : Vérifier si un utilisateur est mineur grâce à son âge. Mettre une variable `resultat` à `Vrai` si cela est le cas, sinon mettez la à `Faux`.
age <- 12
*/

/*
ALGO
resultat <- Faux
@Si age < 18
    @DebutBloc
        resultat <- Vrai
    @FinBloc
*/
    
############################################################
/* 
Question 5 : Echanger les 2 premiers éléments d'un tableau
tab <- [23, 4, 2, 543, 34, ...]
*/ 

/* 
ALGO
Méthode 1
A <- tab[0]
tab[0] <- tab[1]
tab[1] <- A

Méthode 2
[tab[0], tab[1]] <- [tab[1], tab[0]]
*/

############################################################
/*
Question 6 : Compter le nombre d'éléments dans un tableau. Mettre le compte dans resultat.
tab <- [23, 4, 2, 543, 34] 
*/

/*
ALGO
resultat <- 0
@PourChaque element @Dans tab
    @DebutBloc
        resultat <- resultat + 1
    @FinBloc
*/

############################################################

/* Question 7 : Faire la somme des éléments d'un tableau
tab <- [23, 4, 2, 543, 34] */


/* ALGO
Méthode 1
---------
resultat <- 0
@PourChaque prix_en_cours @Dans tab
    @DebutBloc
        resultat <- resultat + prix_en_cours
    @FinBloc

Méthode 2
---------
compte <- 0
@PourChaque element @Dans tab
  @DebutBloc
    compte <- compte + 1 // On ajoute 1 à la valeur du "compte" (incrémentation)
  @FinBloc

resultat <- 0
@Pour i @De 0 @A compte 
  @DebutBloc
    resultat <- resultat + tab[i] // On ajouter la valeur de l'élément parcouru (via son indice) et on fait une addition
  @FinBloc 
  
*/
############################################################

/*
Question 8: Trouver l'élément maximum d'un tableau comprenant des nombres de 0 à 1000. Mettre le numbre maximum dans resultat.
tab <- [...]
*/

/*
ALGO
resultat <- 0
@PourChaque prix_en_cours @Dans tab
    @Debutbloc
    @Si prix_en_cours > resultat
        @DebutBloc
            resultat <- prix_en_cours
        @FinBloc
    @FinBloc
*/
    
############################################################
/*
Question 9 : Trouver l'élément minimum d'un tableau comprenant des nombres de 0 à 1000
tab <- [...]
*/
    
/*
ALGO
    resultat <- tab[0]
@PourChaque prix_en_cours @Dans tab
    @Debutbloc
    @Si prix_en_cours < resultat
        @DebutBloc
            resultat <- prix_en_cours
        @FinBloc
    @FinBloc
*/
############################################################
/* 
Question 10 : Trouver le premier élément supérieur à 500. S'il n'y en a pas, le résultat doit être 0
tab <- [23, 4, 2, 543, 34] 
*/

/* 
ALGO
Méthode 1
---------
resultat <- 0
@PourChaque element @Dans tab 
  @DebutBloc
  @Si element > 500
    @DebutBloc
      resultat <- element 
    @Stop 
    @FinBloc
  @FinBloc  

Méthode 2
---------
i <- 0
@TantQue tab[i] < 500 // Tant que l'élement à la position actuelle est strictement inférieur à 500
  @DebutBloc
    i <- i + 1 // On continue d'avancer
    @Si i > longueur -1 // Si la position actuelle est strictement supérieure à la position maximale autorisée (longueur - 1)
      @DebutBloc
        @Stop // On termine la boucle avec l'instruction "Break"
      @FinBloc
  @FinBloc

resultat <- 0
@Si tab[i] >= 500
  @DebutBloc
    resultat <- tab[i]
  @FinBloc
*/
  
############################################################
  
/*
Question 11 : Copier le tableau tab dans un autre tableau autre
tab <- [23, 4, 2, 543, 34]
*/

/*
ALGO
Méthode 1
---------
autre <- []
@PourChaque element @Dans tab
    @DebutBloc
        Ajouter element Dans autre
    @FinBloc

Méthode 2
---------
autre <- tab
*/
    
/*
Question 12 : Copier les premiers éléments d'un tableau dont la somme fait au moins 500
tab <- [23, 4, 2, 543, 34]
*/
    
/*
ALGO
autre_tableau <- []
somme <- 0
@PourChaque prix_en_cours @Dans tab
    @DebutBloc
    somme <- somme + prix_en_cours
    Ajouter prix_en_cours Dans autre_tableau
    @Si somme >= 500
        @DebutBloc
        @Stop
        @FinBloc
    @FinBloc
*/