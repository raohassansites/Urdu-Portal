function addVote(id,vote) {
    $.ajax({
    url: "vote_action.php",
    data: {id:id, vote:vote},
    type: "POST",
    beforeSend: function(){
      $('#links-'+id+' .btn-vote').html("<img src='loading.gif' height='50px'>");
    },
    success: function(data){ 
      //$('#data').html(data);
       var obj = JSON.parse(data);
    var vote = obj.vote;
    var vote_status= obj.netvotes;
    var up,down;
    switch(vote) {
      case "1":
      vote = vote+1;
      up="disabled";
      down="enabled";
      //vote_status = vote_status+1;
      break;
      case "-1":
      vote = vote-1;
       up="enabled";
      down="disabled";
      //vote_status = vote_status-1;
      break;
      case "0":
       up="enabled";
      down="enabled";
      break;
    }
    $('#vote-'+id).val(vote);
    $('#vote_status-'+id).val(vote_status);
    var vote_button_html = '<input type="button" title="Up" class="up" onClick="addVote('+id+',\'1\')" '+up+' /><div class="label-vote">'+vote_status+'</div><input type="button" title="Down" class="down"  onClick="addVote('+id+',\'-1\')" '+down+' />';  
    $('#links-'+id+' .btn-vote').html(vote_button_html);
    }
    });
  }
  