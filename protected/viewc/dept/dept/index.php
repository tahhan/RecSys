<h1><?php echo $data['dept']->name; ?></h1>
<fieldset>
   <legend>RRFs</legend>
   <a href="<?php echo $data['APP_URL']; ?>dept/add_rrf" class="button">Add New RRF</a>
   <ul>
      <?php $doo_view_basic_1307735149 = $data['rrfs'];
if (!empty($doo_view_basic_1307735149)):
foreach($doo_view_basic_1307735149 as $data['rrf']):
?>
      <li><a href="<?php echo $data['APP_URL']; ?>dept/view_rrf/<?php echo $data['rrf']->id; ?>" class="button"><?php echo $data['rrf']->job_title; ?></a> <span>(<?php echo $data['rrf']->status; ?>)</span></li>
      <?php endforeach;
 else: ?>
      <h3>RRFs are empty</h3>
      <?php endif; ?>
   </ul>
</fieldset>
<fieldset>
   <legend>Vacancies</legend>
   <ul>
      <?php $doo_view_basic_1307735150 = $data['vacancies'];
if (!empty($doo_view_basic_1307735150)):
foreach($doo_view_basic_1307735150 as $data['vacancy']):
?>
      <li><a href="<?php echo $data['APP_URL']; ?>dept/view_vacancy/<?php echo $data['vacancy']->id; ?>" class="button"><?php echo $data['vacancy']->job_title; ?></a> <span>(<?php echo $data['vacancy']->status; ?>)</span></li>

      <?php endforeach;
 else: ?>
      <h3>vacancies are empty</h3>
      <?php endif; ?>
   </ul>
</fieldset>