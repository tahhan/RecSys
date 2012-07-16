$(document).ready(function(){
   $( ".datepicker" ).datepicker({
      //altField: '#actualStartDate' , 
      changeYear: true
   });
});

function addMoreWorkExp(){
   var count = $('#work_exp_list').children('.element').length;
   var work_exp = $('#work_exp').clone().removeAttr('id');
   work_exp.find('input.job_title').attr('name', 'work_exp['+ count + '][job_title]');
   work_exp.find('input.job_title').val('');
   work_exp.find('input.company_name').attr('name', 'work_exp['+ count + '][company_name]');
   work_exp.find('input.company_name').val('');
   work_exp.find('select.country').attr('name', 'work_exp['+ count + '][country_id]');
   work_exp.find('select.country').val('');
   work_exp.find('input.start_date').attr('name', 'work_exp['+ count + '][start_date]');
   work_exp.find('input.start_date').val('');
   work_exp.find('input.end_date').attr('name', 'work_exp['+ count + '][end_date]');
   work_exp.find('input.end_date').val('');
   work_exp.find('input.still_working').attr('name', 'work_exp['+ count + '][still_working]');
   work_exp.find('input.still_working').removeAttr('checked');
   work_exp.find('textarea.description').attr('name', 'work_exp['+ count + '][description]');
   work_exp.find('textarea.description').text('');
   work_exp.append('<a href="#0" onclick="delLine($(this))" class="button">[Remove]</a>');
   work_exp.prepend('<hr />');
   $('#work_exp_list').append(work_exp);
   
}

function addMoreDegree(){
   var count = $('#degree_list').children('.element').length;
   var degree = $('#degree').clone().removeAttr('id');
   degree.find('select.degree_level').attr('name', 'degree['+ count +'][degree_level]');
   degree.find('select.degree_level').val('');
   degree.find('input.uni_name').attr('name', 'degree['+ count +'][uni_name]');
   degree.find('input.uni_name').val('');
   degree.find('input.degree').attr('name', 'degree['+ count +'][degree]');
   degree.find('input.degree').val('');
   degree.append('<a href="#0" onclick="delLine($(this))" class="button">[Remove]</a>');
   degree.prepend('<hr />');
   $('#degree_list').append(degree);
   
}

function addMoreEdu(){
   var count = $('#edu_list').children('.element').length;
   var edu = $('#edu').clone().removeAttr('id');
   edu.find('select.edu_level').attr('name', 'edu['+ count +'][edu_level]');
   edu.find('select.edu_level').val('');
   edu.find('input.degree').attr('name', 'edu['+ count +'][degree]');
   edu.find('input.degree').val('');
   edu.find('input.uni_name').attr('name', 'edu['+ count +'][uni_name]');
   edu.find('input.uni_name').val('');
   edu.find('select.country').attr('name', 'edu['+ count +'][country_id]');
   edu.find('select.country').val('');
   edu.find('input.start_date').attr('name', 'edu['+ count +'][start_date]');
   edu.find('input.start_date').val('');
   edu.find('input.graduation_date').attr('name', 'edu['+ count +'][graduation_date]');
   edu.find('input.graduation_date').val('');
   edu.append('<a href="#0" onclick="delLine($(this))" class="button">[Remove]</a>');
   edu.prepend('<hr />');
   $('#edu_list').append(edu);
}

function addMoreOther(){
   var count = $('#other_list').children('.element').length;
   var other = $('#other').clone().removeAttr('id');
   other.find('input.title').attr('name', 'other['+ count +'][title]');
   other.find('input.title').val('');
   other.find('textarea.description').attr('name', 'other['+ count +'][description]');
   other.find('textarea.description').val('');
   other.append('<a href="#0" onclick="delLine($(this))" class="button">[Remove]</a>');
   other.prepend('<hr />');
   $('#other_list').append(other);
}

function delLine(a){
   var del_div =a.parent('div.element');
   del_div.remove();
}