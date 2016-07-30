<footer>

      <div class="content-footer">

            <div class="row">

                <div class="col-lg-12">

                    <div class="col-md-6 copyright">

                        <p>Copyright &copy; Ajarin Dong Bro - <?php echo date('Y'); ?>

                    </div>
					<?php 
					$querysocial=mysql_query("select * from social_link");
					$ressocial=mysql_fetch_object($querysocial);
					?>

                    <div class="col-md-6 socialmedia">

                        <a class="facebook" href="<?php echo $ressocial->facebook; ?>" target="_blank">

                            <i class="fa fa-facebook-square fa-4x"></i>

                        </a>

                        <a class="twitter" href="<?php echo $ressocial->twitter; ?>" target="_blank">

                            <i class="fa fa-twitter-square fa-4x"></i>

                        </a>

                        <a class="instagram" href="<?php echo $ressocial->instagram; ?>" target="_blank">

                            <i class="fa fa-instagram fa-4x"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </footer>