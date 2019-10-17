<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta htpp-equiv="X-UA-compatible" content="ie=edge">

    <title>Pandarius</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/demo.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  </head>

  <body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
       <a class="navbar-brand"href="index.php">Carloncho</a>
       <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse">
           <span class="navbar-toggler-icon"></span>
       </button>
       <div id="my-nav" class="collapse navbar-collapse">
           <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                   <a class="nav-link" href="agregarProducto.php">Agregar Producto</a>
               </li>
               
               <li class="nav-item active">
                   <a class="nav-link" href="mostrarCarrito.php">Carrito(<?php 
                   echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);?>)</a>
               </li>
           </ul>
       </div>
   </nav>
   <br/>
   <br/>
   
   <div class="contanier">
