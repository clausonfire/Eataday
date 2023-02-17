import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FooterComponent } from './footer/footer.component';

import { LogginFormComponent } from './loggin-form/loggin-form.component';
import {ReactiveFormsModule} from "@angular/forms";

import { LoginComponent } from './login/login.component';
import { HeaderComponent } from './header/header.component';


@NgModule({
  declarations: [
    AppComponent,

    FooterComponent

    LogginFormComponent,

    LoginComponent,
    HeaderComponent,


  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    ReactiveFormsModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
