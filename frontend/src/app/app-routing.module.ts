import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TodosComponent } from './todos/todos.component';
import { DetailsComponent } from './details/details.component';



const routes: Routes = [

    { 
        path: '', 
        component: TodosComponent 
    }

    { 
        path: 'details/:id', 
        component: DetailsComponent 
    }

    { 
        path: 'todos', 
        component: TodosComponent 
    }
];




@NgModule({
  imports: [
    CommonModule
  ],
  declarations: []
})
export class AppRoutingModule { }
