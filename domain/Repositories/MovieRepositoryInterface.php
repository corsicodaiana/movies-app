<?php

namespace Domain\Repositories;

interface MovieRepositoryInterface
{
    function saveMovie(string $title, int $year, string $genre);
    function getListMovie();
    function idPeliculaValido(int $idPelicula);
    function editarPelicula(int $idPelicula, string $title, int $year, string $genre);
    function eliminarPelicula(int $idPelicula);
}