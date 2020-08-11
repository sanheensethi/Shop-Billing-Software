$(document).ready(function(){
		$.ajax({
			url:'system/CreateTags.php',
			type:'GET',
			success:function(data){
				$('#CreateSection').html(data);
			}
		});
		
		$.ajax({
			url:'system/itemLists.php',
			type:'GET',
			success:function(data){
				$('#ItemsLists').html(data);
			}
		});
		
		$.ajax({
			url:"list.php",
			type:"GET",
			success:function(data){
				$('#data').html(data);
			}
		});
		
		$('#submit').click(function(){
			var inputval=[];
			var check=[];
			var i=0;
			var j=0;
			
			$('.check:checked').each(function(){
				check[i]=$(this).val();
				i++
			});
			$('.products').each(function(){
				if($(this).val()==''){
					$(this).focus();
					$(this).css({
						'background-color':'#d9534f',
						'color':'#fff'
					});
					$('#show').html('<p class="text-danger">Values Required For Toggle On Items</p>');
					return;
				}
					inputval[j]=$(this).val();
					j++;
			});
				
				if((inputval.length)!=check.length){
					alert('no');
				}else{
					var filename = $('#filename').val();
					if(filename==''){
						$('#filename').focus();
						$('#filename').css({
							'background-color':'#d9534f',
							'color':'#fff'
						});
					}else{
					var keys = check.join(",");
					var values = inputval.join(",");
					$.ajax({
						url:"system/makeList.php",
						type:"POST",
						data:{'check':keys,'values':values,'filename':filename},
						success:function(data){
							$('#show').html(data);
						}
					});
				}
			}
		});
	});