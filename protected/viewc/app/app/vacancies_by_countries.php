<h2>Job vacancies By Country</h2>
<?php $doo_view_basic_1308078557 = $data['countries'];
if (!empty($doo_view_basic_1308078557)):
foreach($doo_view_basic_1308078557 as $data['country']):
?>
<?php if(empty($data['country']->vacancies)!=1): ?>
<div class="country">
   <span class="bold"><?php echo $data['country']->country_name; ?>:</span><br />
   <ul>
      <?php $doo_view_basic_1308078558 = $data['country']->vacancies;
if (!empty($doo_view_basic_1308078558)):
foreach($doo_view_basic_1308078558 as $data['vacancy']):
?>
      <li><a href="<?php echo $data['APP_URL']; ?>app/view_vacancy/<?php echo $data['vacancy']->id; ?>" class="button"><?php echo $data['vacancy']->job_title; ?></a> in <span>(<?php echo $data['vacancy']->Department->Company->company_name; ?>)</span></li>
      <?php endforeach;
 endif; ?>
   </ul>
</div>
<?php endif; ?>
<?php endforeach;
 endif; ?>
