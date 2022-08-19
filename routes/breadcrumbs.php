<?php

use App\Models\Service;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
 
Breadcrumbs::for('service', function (BreadcrumbTrail $trail): void {
    $trail->push('Service', route('service'));
});
 
Breadcrumbs::for('service.show', function (BreadcrumbTrail $trail, User $project): void {
    $trail->parent('service.index');
 
    $trail->push($user->name, route('service.show', $user));
});
 
Breadcrumbs::for('service.edit', function (BreadcrumbTrail $trail, User $project): void {
    $trail->parent('service.show');
 
    $trail->push('Edit', route('service.edit', $user));
});
 
