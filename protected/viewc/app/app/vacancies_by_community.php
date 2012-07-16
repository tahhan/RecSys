<h2>Job Vacancies By Community</h2>
<?php $doo_view_basic_1308078549 = $data['industries'];
if (!empty($doo_view_basic_1308078549)):
foreach($doo_view_basic_1308078549 as $data['industry']):
?>
<?php if(empty($data['industry']->vacancies)!=1): ?>
<div class="country">
   <span class="bold"><?php echo $data['industry']->industry_name; ?>:</span><br />
   <ul>
      <?php $doo_view_basic_1308078550 = $data['industry']->vacancies;
if (!empty($doo_view_basic_1308078550)):
foreach($doo_view_basic_1308078550 as $data['vacancy']):
?>
      <li><a href="<?php echo $data['APP_URL']; ?>app/view_vacancy/<?php echo $data['vacancy']->id; ?>" class="button"><?php echo $data['vacancy']->job_title; ?></a> in <span>(<?php echo $data['vacancy']->Department->Company->company_name; ?>)</span></li>
      <?php endforeach;
 endif; ?>
   </ul>
</div>
<?php endif; ?>
<?php endforeach;
 endif; ?>
