# secondSymfonyG2

## Installation de `symfony LTS`

    symfony new secondSymfonyG2 --webapp --version=lts

### Création d'un contrôleur

    php bin/console make:controller

created: src/Controller/PublicController.php

created: templates/public/index.html.twig

### Modification du contrôleur

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PublicController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        // appel de la vue sans variables
        return $this->render('public/index.html.twig', [
        ]);
    }

    #[Route(
        // chemin URL
        path: '/article/{id}',
        // nom
        name: 'article',
        // on demande que l'id soit un entier positif
        requirements: ['id' => '\d+'],
        // si l'ID n'est pas présent, on lui donne une valeur par défaut
        defaults: ['id' => 1],
        // on utilise uniquement la méthode get
        methods: ['GET'])]
    public function article(int $id): Response
    {
        // appel de la vue avec la variable idarticle contenant $id
        return $this->render('public/article.html.twig', [
            'idarticle' => $id,
        ]);
    }

}

```

### Modification des vues

templates/public/index.html.twig

```php
{% extends 'base.html.twig' %}

{% block title %}{{ parent() }}Homepage{% endblock %}

{% block body %}

<div class="example-wrapper">
    <h1>HomePage ✅</h1>
{% include 'public/menu.html.twig' %}

</div>
{% endblock %}
```

templates/public/menu.html.twig

```php
<nav class="">
    <a href="{{ path('homepage') }}">Accueil</a> | <a href="{{ path('article') }}">Article 1</a> | <a href="{{ path('article',{'id':2}) }}">Article 2</a>  | <a href="{{ path('article',{'id':3}) }}">Article 3</a> | <a href="/article/lulu">Article lulu (interdit)</a>
</nav>
```

templates/public/article.html.twig

```php
{% extends 'base.html.twig' %}

{% block title %}{{ parent() }}Article{% endblock %}

{% block body %}

<div class="example-wrapper">
    <h1>Article {{ idarticle }}✅</h1>
    {% include 'public/menu.html.twig' %}
    <h2>Notre article a l'id {{ idarticle }}</h2>

</div>
{% endblock %}

```