<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= BASE_URL . "/css/style.css" ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <title>Заповніть форму</title>
</head>

<body>
  <div class="box">
    <h2>Add a new employee</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>?action=rezult" method="post">
      <div class="mb-3">
        <label for="first_name" class="form-label">First Name:</label>
        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="enter first name">
      </div>
      <div class="mb-3">
        <label for="last_name" class="form-label">Last Name:</label>
        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="enter last_name">
      </div>
      <div class="mb-3">
        <label for="gender" class="form-label">Gender:</label>
        <select name="gender" class="form-select">
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="birth_date" class="form-label">Birth_date:</label>
        <div class="input-group date" id="datepicker1">
          <input type="text" class="form-control" id="birth_date" name="birth_date" />
          <span class="input-group-append">
            <span class="input-group-text bg-light d-block">
              <i class="fa fa-calendar"></i>
            </span>
          </span>
        </div>
      </div>
      <div class="mb-3">
        <label for="hire_date" class="form-label">Hire date:</label>
        <div class="input-group date" id="datepicker2">
          <input type="text" class="form-control" id="hire_date" name="hire_date" />
          <span class="input-group-append">
            <span class="input-group-text bg-light d-block">
              <i class="fa fa-calendar"></i>
            </span>
          </span>
        </div>
      </div>
      <input type="submit" name="submit" class="btn btn-primary" value="Відправити">
    </form>
  </div>

  <script type="text/javascript">
    $(function() {
      $('#datepicker1').datepicker();
    });
    $(function() {
      $('#datepicker2').datepicker();
    });
  </script>
</body>

</html>