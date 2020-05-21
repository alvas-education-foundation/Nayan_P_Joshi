
<?php
include('header.php');
?>
  <section id="hero">
    <div class="hero-container">
      <h1>Welcome to Speed Age</h1>
    </div>
  </section><!-- #hero -->

  <main id="main">

   
     
        </div>

      </div>
    </section><!-- #contact -->

  </main>

<?php
include('footer.php');


if(isset($_REQUEST['sendmessage']))
{
  include('connection.php');
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$subject=$_REQUEST['subject'];
$message=$_REQUEST['message'];

$sql=mysqli_query($conn,"INSERT INTO `testimonial` (`id`, `name`, `email`, `subject`, `message`) VALUES (NULL, '$name', '$email', '$subject', '$message')");

if($sql)
{
  echo "<script>alert('Thank you for submit your Feedback');</script>";
}



}
?>