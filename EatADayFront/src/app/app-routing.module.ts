import { NgModule, Component } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { MatchRecetasComponent } from './match-recetas/match-recetas.component';
import { RecipeDetailComponent } from './recipe-detail/recipe-detail.component';
import { ShoppingDiaryComponent } from './shopping-diary/shopping-diary.component';
import { CloseSupermarketsComponent } from './close-supermarkets/close-supermarkets.component';
import { SupermarketDetailComponent } from './supermarket-detail/supermarket-detail.component';
import {LoginGGuard} from "./login-g.guard";

const routes: Routes = [
  { path: 'login', component: LoginComponent },
  { path: 'matchAlimentos', component: MatchRecetasComponent, canActivate:[LoginGGuard]},
  { path: 'RecipeDetail/:id', component: RecipeDetailComponent, canActivate:[LoginGGuard] },
  { path: 'shoppingDiary', component: ShoppingDiaryComponent },
  { path: 'supermarketDetail/:id', component: SupermarketDetailComponent, canActivate:[LoginGGuard] },
  { path: 'closeSupermarkets/:id', component: CloseSupermarketsComponent, canActivate:[LoginGGuard] },
  { path: '**', component: LoginComponent },

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

