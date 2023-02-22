import { NgModule, Component } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { MatchRecetasComponent } from './match-recetas/match-recetas.component';
import { RecipeDetailComponent } from './recipe-detail/recipe-detail.component';

const routes: Routes = [
  { path: 'login', component: LoginComponent },
  { path: 'matchAlimentos', component: MatchRecetasComponent },
  { path: 'RecipeDetail/:id', component: RecipeDetailComponent },
  { path: '**', component: LoginComponent},

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

