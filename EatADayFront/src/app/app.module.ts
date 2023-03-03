import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FooterComponent } from './footer/footer.component';

import { LogginFormComponent } from './loggin-form/loggin-form.component';
import {ReactiveFormsModule} from "@angular/forms";

import { LoginComponent } from './login/login.component';
import { HeaderComponent } from './header/header.component';

import { RegisterComponent } from './register/register.component';

import { MatchRecetasComponent } from './match-recetas/match-recetas.component';
import { BuscadorAlimentosComponent } from './buscador-alimentos/buscador-alimentos.component';
import {HttpClientModule, HttpErrorResponse} from '@angular/common/http';
import { RecetasTopComponent } from './recetas-top/recetas-top.component';
import { RecipeDetailComponent } from './recipe-detail/recipe-detail.component';
import { ShoppingDiaryComponent } from './shopping-diary/shopping-diary.component';
import { CloseSupermarketsComponent } from './close-supermarkets/close-supermarkets.component';
import { SupermarketDetailComponent } from './supermarket-detail/supermarket-detail.component';
import { BuscadorMixtoComponent } from './buscador-mixto/buscador-mixto.component';
import { QuestionsComponent } from './questions/questions.component';
import { QuestionDetailComponent } from './question-detail/question-detail.component';
import { SendRecipeComponent } from './send-recipe/send-recipe.component';
// import { QuestionDetailComponent } from './question-detail/question-detail.component';



@NgModule({
  declarations: [
    AppComponent,
    FooterComponent,
    LogginFormComponent,
    LoginComponent,
    HeaderComponent,
    RegisterComponent,
    MatchRecetasComponent,
    BuscadorAlimentosComponent,
    RecetasTopComponent,
    RecipeDetailComponent,
    ShoppingDiaryComponent,
    CloseSupermarketsComponent,
    SupermarketDetailComponent,
    BuscadorMixtoComponent,
    QuestionsComponent,
    QuestionDetailComponent,
    SendRecipeComponent,



  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    ReactiveFormsModule,

    HttpClientModule,


  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
//
