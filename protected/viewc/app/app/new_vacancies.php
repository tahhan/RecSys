<h2>Latest Job Vacancies</h2>
<ul>
   <?php $doo_view_basic_1307832058 = $data['vacancies'];
if (!empty($doo_view_basic_1307832058)):
foreach($doo_view_basic_1307832058 as $data['vacancy']):
?>
   <li><a href="<?php echo $data['APP_URL']; ?>app/view_vacancy/<?php echo $data['vacancy']->id; ?>" class="button"><?php echo $data['vacancy']->job_title; ?></a> in <?php echo $data['vacancy']->Department->Company->company_name; ?></li>
   <?php endforeach;
 else: ?>
<h3>No new vacancies</h3>
<?php endif; ?>
</ul>
