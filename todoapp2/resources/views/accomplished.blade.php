<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>To-Do-App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Borel&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<script src="https://cdn.lordicon.com/lordicon.js"></script>
<style>
            body {
            background-color:rgb(36, 36, 36);
            color: #fff;
            }
        

        * {
            font-family: Poppins;
        }

        .text-bg-primary {
            background-color:rgb(28, 102, 213) !important;
            color: #fff !important;
        }

        .text-primary{
            color:rgb(28, 102, 213) !important;
        }


          .nav-item {
            margin-left: 9px;
            padding: 1px;
          }

          .active {
            background-color: rgb(214, 214, 214);
            border-radius: 5px;
          }

          .nav-item:hover {
            background-color:rgb(206, 206, 206) !important;
            color: #fff !important;
            border-radius: 5px;
          }

          
    

    </style>
  </head>


   <nav class="navbar navbar-dark bg-dark fixed-top shadow">
  <div class="container-fluid">
    <a class="navbar-brand border-0" href="#">   <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="bi bi-three-dots text-light"></span>
    </button>
  </a>
      <a class="navbar-brand" href="#">
   <img src="https://s.pacn.ws/1/gallery/large/GA.07993.0001.svg?1713501412&v=PX-479" alt="" height="24" class="d-inline-block align-text-top" style="filter: invert(100%);">
      </a>


     <a class="navbar-brand mt-3" href="#" style="font-family: Borel; font-size: 18px;">keep it tidy.</a>
 
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
         <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
          <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
        </form>
        <hr>



   <p class="nav-title fw-bold">TASKS</p>
        <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="/index"><i class="bi bi-list-task"></i> TODAY</a>
          </li>

           <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/accomplished"><i class="bi bi-fast-forward-fill"></i> ACCOMPLISHED</a>
          </li>
        </ul>
       <br>
           <p class="nav-title fw-bold">LISTS</p>

            <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#"><i class="bi bi-house-fill text-secondary"></i>  HOME</a>
          </li>

           <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#"><i class="bi bi-file-person-fill text-primary"></i> PERSONAL</a>
          </li>

             <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#"><i class="bi bi-building-fill text-danger"></i> WORK</a>
          </li>
        </ul>
       
      </div>
    </div>
  </div>
</nav> 

<br><br><br>


  <body>
<div class="container">
    <div class="row">
        <div class="col mt-2">
          <h1 class="display-2 fw-bold titles">Accomplished <span class="badge text-bg-secondary task-count">{{ $count }}</span></h1>
          

            <div class="liveAlertPlaceholder"></div>
<!-- adding a new task -->
<div class="offcanvas offcanvas-end rounded text-bg-dark" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title fw-bold" id="offcanvasRightLabel">Task:</h5>

  </div>

<!-- add task container -->
  <div class="offcanvas-body">
<form class="needs-validation" action="{{ route('Notes.store') }}" method="POST" novalidate>
    @csrf
  <div class="mb-3">
    <label for="inputTaskTitle" class="form-label">Title:</label>
    <input type="text" class="form-control" id="inputTaskTitle" aria-describedby="titleHelp" name="title" required>
    <div id="titleHelp" class="form-text text-light">Name your new task!</div>
    <div class="invalid-feedback">Please enter a title.</div>
    <hr>
       <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="taskDescription" name="description" required></textarea>
  <label for="taskDescription">Description</label>
  <div class="invalid-feedback">Please enter a description.</div>
</div>
<hr>

<div class="form">
  <div id="titleHelp" class="form-text text-light">Due date:</div>
  <input type="date" class="form-control col-5" id="taskDeadline" name="date" required>
  <div class="invalid-feedback">Please enter a due date.</div>
</div>

 <hr>

<div id="titleHelp" class="form-text text-light">Label your new task!</div>
 <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Lists</label>
  <select class="form-select" id="inputGroupSelect01" name="list" required>
    <option selected disabled>Lists</option>
    <option value="🏠">🏠</option>
    <option value="👤">👤</option>
    <option value="🏢">🏢</option>
  </select>
  <div class="invalid-feedback">Please select a list.</div>
</div>

  </div>
 
  <div class="col">
  <button type="button" class="btn btn-outline-light" data-bs-dismiss="offcanvas" aria-label="Close">Nevermind</button>
 <button type="submit" class="btn btn-secondary" onclick="addTask()">Save</button>
  </div>

</form>



  </div>

  
</div>
          <!-- end of adding new task -->


            <hr>
            <div class="row task-list">
            @foreach ($notes as $note)
    <div class="col-md-3  col-sm-12 mb-2">
  <div class="card shadow">

    <div class="card-body">
      <h5 class="card-title fw-bold" id="taskTitle">{{ $note->title }}</h5>
      <span class="badge text-bg-secondary" id="taskDate"> {{ $note->date }}</span>
      <span class="badge text-bg-secondary" id="taskLabel">{{ $note->list }}</span>
      <hr>
      <p class="card-text fw-light fs-6" id="taskDescription">{{ $note->description }}</p>
    </div>
    </div>
  </div>
        @endforeach
</div>


  



     </div>
      
</div>
      </div>


            </div>
  <!-- end of task list -->

        </div>

        
</div>
</div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

  </body>

</html>