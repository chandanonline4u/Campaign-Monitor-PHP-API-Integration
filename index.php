<!DOCTYPE html>
<html>
  <head>
    <title>Campaign Monitor - Sign up</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
  </head>
  
  
  <body>
    <div class="page">
      <section class="section-signup">
        <div class="container clearfix">
          <form name="form-subscription" id="form-subscription" class="custom-form" method="POST" action="ajaxscripts.php?type=subscription">
            <div class="alert-msg hidden"></div>
            <input type="text" maxlength="100" placeholder="Name" name="name" class="input-feild required" required />
            <input type="email" maxlength="100" placeholder="Email Address" name="email" class="input-feild required email" required />
            <input type="submit" id="btn-submit" name="btn-submit" value="Submit" class="btn-signup" />
          </form>
        </div>
      </section>
    </div>
  </body>
</html>

