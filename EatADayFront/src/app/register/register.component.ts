import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { RegisterService } from '../register.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})

export class RegisterComponent implements OnInit {
  ngOnInit(): void {
    this.registerForm.valueChanges.subscribe(values => {
      console.log(values);
    })
  }
  constructor(private registerService: RegisterService){}

  public registerForm: FormGroup = new FormGroup({
    name: new FormControl(null, [
      Validators.required
    ]),
    email: new FormControl(null, [
      Validators.required, Validators.email
    ]),
    password: new FormControl(null, [
      Validators.required
    ]),
    
  });
  public save(){
    if (this.registerForm.invalid) {
      alert('Formulario invalido'); return;
    }
    this.registerService.register(this.registerForm.value).subscribe();

  }
}

//