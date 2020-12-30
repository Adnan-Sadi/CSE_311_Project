$(document).ready(function(){

  //creating the member table
  var dataTable = $('#member_table').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
      url: "./includes/fetch.php",
      type: "POST"
    },
    "columnDefs": [{
      "targets": [ 0,1,2,3, 4, 5],
      "orderable": false,
    },],

  });

    $('#add_button').click(function () {
    $('#user_form')[0].reset();
    $('.modal-title').text("Add User");
    $('#action').val("Add");
    $('#operation').val("Add");
  });


  //when a new member is being added
  $(document).on('submit', '#user_form', function (event) {
    event.preventDefault();
    var memName = $('#name').val();
    var stdId = $('#id').val();
    var dept = $('#dept_name').val();
    var memEmail = $('#email').val();
    var memPhone = $('#phone').val();
    var memPosition = $('#position').val();
    var semJoined = $('#sem_joined').val();
    
    //check if any field is empty
    if (memName != '' && stdId != '' && dept != '' && memEmail != '' && memPhone != '' && memPosition != '' && semJoined != '') {
      $.ajax({
        url: "./includes/member_inc.php",
        method: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (data) {
          alert(data);
          $('#user_form')[0].reset();
          $('#userModal').modal('hide');
          dataTable.ajax.reload(); //reloading member table
        }
      });
    }
    else {
      alert("All Fields are Required");
    }
  });
  
  //When a member info is being updated
  $(document).on('click', '.update', function () {
    var user_id = $(this).attr("id");
    $.ajax({
      url: "./includes/fetch_single.php",
      method: "POST",
      data: { user_id: user_id },
      dataType: "json",
      success: function (data) {
        //updating modal attribute values
        $('#userModal').modal('show');
        $('#name').val(data.Name);
        $('#id').val(data.Id);
        $('#dept_name').val(data.Dept_name);
        $('#email').val(data.Email);
        $('#phone').val(data.PhoneNum);
        $('#position').val(data.Position);
        $('#sem_joined').val(data.Semester_joined);
        $('.modal-title').text("Edit User");
        $('#user_id').val(user_id);
        $('#action').val("Edit");
        $('#operation').val("Edit");
      }
    })
  });

  //When a member info is being deleted
  $(document).on('click', '.delete', function () {
    var user_id = $(this).attr("id");
    if (confirm("Are you sure you want to delete this?")) {
      $.ajax({
        url: "./includes/delete_member.php",
        method: "POST",
        data: { user_id: user_id },
        success: function (data) {
          alert(data);
          dataTable.ajax.reload();
        }
      });
    }
    else {
      return false;
    }
  });

});




