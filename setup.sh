#!/bin/bash

reset

RED="\e[31m"
GREEN="\e[32m"
WHITE="\e[97m"
BLUE="\e[34m"
BLACK="\e[30m"
YELLOW="\e[33m"
ENDCOLOR="\e[0m"

echo -e "
${RED}
 ██████╗ ██╗   ██╗███████╗███████╗████████╗
██╔═══██╗██║   ██║██╔════╝██╔════╝╚══██╔══╝
██║   ██║██║   ██║█████╗  ███████╗   ██║
██║▄▄ ██║██║   ██║██╔══╝  ╚════██║   ██║
╚██████╔╝╚██████╔╝███████╗███████║   ██║
 ╚══▀▀═╝  ╚═════╝ ╚══════╝╚══════╝   ╚═╝
${ENDCOLOR}

    ${YELLOW}=> Exercício 01 e 03 - CRUD/API de Produtos${ENDCOLOR}

    [*] Author: Thiago Silva AKA thiiagoms
    [*] E-mail: thiagom.devsec@gmail.com
"
echo -e "=> Iniciando os containers\n"
{
    docker-compose up -d
} &> /dev/null

echo -e "=> Instalando dependências da aplicação\n"
{
    docker-compose exec app composer install
} &> /dev/null

echo -e "=> Executando migrations\n"
# {
    docker-compose exec app cp .env.example .env
    docker-compose exec app php artisan key:generate
    docker-compose exec app php artisan migrate --seed
# }  &> /dev/null

echo -e "[*] Aplicação disponível em ${GREEN}http://localhost:8000${ENDCOLOR}\n"
