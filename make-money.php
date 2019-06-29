<?php
include("top_header.php");
include("referconfig.php");

switch($row['member_type']) {
	case NULL:
	case '0':
		$membertype="Free";
		$earning=FREE;
		break;
	case '1':
		$membertype="Basic";
		$earning=BASIC;
		break;
	case '2':
		$membertype="Premium";
		$earning=PREMIUM;
		break;
	default:
		$membertype="Free";
		$earning=FREE;
}
/*$paidreferrals = $db_con->query('SELECT count(*) FROM users WHERE referred_by='.$_SESSION['user_session'].' and member_type>0')->fetchColumn();*/


$paidreferrals = mysqli_fetch_array(mysqli_query($conn,'SELECT count(*) FROM users WHERE referred_by='.$_SESSION['user_session'].' and member_type>0'));

$paidreferrals = $paidreferrals[0];
?>


<div class="body-container">
	<div class="container custombg">
		<div class="col-lg-12 col-md-12 custom_padding">
			<?php include("left_nav.php"); ?>
			<!--main content starts-->
			<div class="col-lg-8 col-sm-12 col-xs-12 col-md-12 paddingset">
				<div class="borderouter"><!--border div starts here -->
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="margin-top:25px;">
						<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
							<span style="font-size:16px; color:#F00;font-weight:bold;">Make money by telling folks about Wowme!</span>
						</div>
						<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
							<p>You're a <?php echo $membertype; ?> member, so you earn $<?php echo number_format($earning,2) ?> on the 20th of every month for each person you refer that becomes an active basic or premium member.</p>
							<p>To refer folks to the site, just share your personalized URL below:</p>
							<div class="form-group">
								<p><form><input type="button" value="Copy" class="btn btn-default buttongreen pull-right" data-clipboard-target="#referurl"><input type="text" ID="referurl" class="form-control" value="https://wowme.deals/refer/<?php echo urlencode($row['username']);?>" readonly style="max-width:80%"></form></p>
							</div>
<?php if ( !$paidreferrals > 0 ) : ?>
							<p>You have not referred any paid accounts.</p>
<?php else : ?>
							<p>You have referred <?php echo $paidreferrals;?> paid account(s), and so far will receive $<?php echo number_format($earning * $paidreferrals,2) ?> this month.<p>
<?php endif ?>

<?php if ($paidreferrals > 0 AND $membertype='Free') :?>
							<p>If you were a Basic member, you would receive $<?php echo (BASIC * $paidreferrals) ?>. If you were a Premium member, you would receive $<?php echo (PREMIUM * $paidreferrals) ?>.</p>
<?php elseif ($paidreferrals > 0 AND $membertype='Basic') :?>
							<p>If you were a Premium member, you would receive $<?php echo (PREMIUM * $paidreferrals) ?>.</p>
<?php endif ?>
						</div>
					</div>
				</div><!--border div ends here -->
			</div>
		</div>
	</div><!-- /container custombg -->
</div><!-- /body-container -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.16/clipboard.min.js"></script>
<script>new Clipboard('.btn');</script>
</body>
</html>