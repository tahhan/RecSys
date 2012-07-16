function addDept(){
   var count = $('#dept_list').children('.element').length;
   var dept = $('#dept').clone().removeAttr('id');
   dept.find('input.department_name').attr('name', 'department['+ count + '][name]');
   dept.find('input.department_name').val('');
   dept.find('input.business_partner').attr('name', 'department['+ count + '][employee][name]');
   dept.find('input.business_partner').val('');
   dept.find('input.phone_number').attr('name', 'department['+ count + '][employee][phone_number]');
   dept.find('input.phone_number').val('');
   dept.find('input.email').attr('name', 'department['+ count + '][employee][email]');
   dept.find('input.email').val('');
   dept.find('input.password').attr('name', 'department['+ count + '][employee][password]');
   dept.find('input.password').val('');
   dept.find('input.confirm_password').attr('name', 'department['+ count + '][employee][confirm_password]');
   dept.find('input.confirm_password').val('');

   dept.append('<a href="#0" onclick="delLine($(this))">[Remove]</a>');
   dept.prepend('<hr />');
   $('#dept_list').append(dept);
   
}

function delLine(a){
   var del_div =a.parent('div.element');
   del_div.remove();
}