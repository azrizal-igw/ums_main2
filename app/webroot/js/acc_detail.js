(function($) {

    var methods = {








    // lists by month
    monthly : function(options) { 
        return this.each(function() {
            $('#show_loading').show();
            //var dataPost = '{sitecode : options.sitecode,transdate : options.transdate}'
            $.post(options.url,options,function(data) {
                



                var str = 'Status : '+data['acc_status']['title'] +'&nbsp;&nbsp;';
                if (data['acc_status']['accstatustitle_id'] == 1) {
                    str += '<a href="#" alt="'+ data['acc_status']['id'] +'" id="update_status" >Click To Submit</a></br>';
                }



                 
				//jam commented on 05072013
                // if(data['acc_status']['accstatustitle_id'] == 2) {
                // str += '<a href="#" acc_status="'+ data['acc_status']['id'] +'" id="close_status" >Click To Close</a></br>';
                // }





                if (data['acc_status']['accstatustitle_id'] == 2) {
                    str += '<a href="#" acc_status="'+ data['acc_status']['id'] +'" id="close_status" >Click To Close </a>';
				    str += " or " + '<a href="#" acc_status="'+ data['acc_status']['id'] +'" id="edit_status" >Back to Editing </a></br>';//jam added 05072013
                }




                

                // 1st row
                str +='<table id="account">';
                str +='<tr>';
                str +=    '<th colspan="5" class="no_border">&nbsp;</th>';
                str +=    '<th rowspan="34" class="no_border">&nbsp;</th>';
                str +=    '<th colspan="'+ data['income'].length +'" class="Tajuk">Pendapatan</th>';
                str +=    '<th rowspan="34" class="no_border">&nbsp;</th>';
                str +=    '<th colspan="'+ data['expense'].length +'" class="Tajuk">Perbelanjaan</th>';
                str +='</tr>';
                




                // 2nd row
                // 1st column 
                str +='<tr>';
                str +=    '<th class="Tajuk2">Tarikh</th>';
                str +=    '<th class="Tajuk2">Perkara</th>';
                str +=    '<th class="Tajuk2">Masuk</th>';
                str +=    '<th class="Tajuk2">Keluar</th>';
                str +=    '<th  class="Tajuk2">Baki</th>';
                




                // 2nd column for 'pendapatan' (internet|keahlian|cetakan|lain-lain)
                $.each(data['income'],function(index,value) {
                    str += '<th class="Tajuk2">'+value.Acccode.name+'</th>';
                })






                // 3rd column for 'perbelanjaan' (perjalanan|penyelenggaraan|alat tulis|peralatan|event|lain-lain)
                $.each(data['expense'],function(index,value) {
                    str += '<th class="Tajuk2">'+value.Acccode.name+'</th>';
                })
                // str +='<td>' + options.transmonth+ day + '</td>'
                str +=' </tr>';







                // 3rd row
                str +='<tr>';
                str +=    '<td></td>';
                str +=    '<td>BF</td>';
                str +=    '<td></td>';
                str +=    '<td></td>';
                str +=    '<td>'+ data['bf'] +'</td>';
                $.each(data['income'],function(index,value) {
                    str +=    '<td></td>';
                })
                $.each(data['expense'],function(index,value) {
                    str +=    '<td></td>';
                })
                str +='</tr>';
                





                var attr = '';
                var day = 0;
                for (var i = 1; i <= 31; i++) {            
                    if (data[i]) {
                        if (i < 10) {
                            day = '0'+ i;
                        } 
                        else {
                            day = i;
                        }




                        // 4th row
                        str += '<tr>';
                        str +=    '<td>'+ i +'</td>';
                        str +=    '<td></td>';
                        attr = '/' +options.transmonth+ day +'/dr';





                        if (data[i]['masuk']) {
                            str +=    '<td class="detail" alt="'+attr+'">'+ data[i]['masuk'] +'</td>';
                        } 
                        else {
                            str +=    '<td class="detail" alt="'+attr+'"></td>';    
                        }
                        attr = '/' +options.transmonth+ day +'/cr';






                        if (data[i]['keluar']) {
                            str +=    '<td class="detail" alt="'+attr+'">'+ data[i]['keluar'] +'</td>';
                        } 
                        else {
                            str +=    '<td class="detail" alt="'+attr+'"></td>';    
                        }
                        




                        if (data[i]['bakiforward']) {
                            str +=    '<td>'+ data[i]['bakiforward'] +'</td>';
                        } 
                        else {
                            str +=    '<td></td>';    
                        }
                        



                        $.each(data['income'],function(index,value) {
                            attr = '/' +options.transmonth +day +'/dr'+'/'+value.Acccode.id;
                            var sccId = value.Acccode.id;
                            if(data[i][sccId]) {
                                str +=    '<td class="div-table-col" alt="'+attr+'">'+data[i][value.Acccode.id]['amount']+'</td>';
                            } 
                            else {
                                str +=    '<td class="div-table-col" alt="'+attr+'"></td>';
                            }
                        })





                        $.each(data['expense'],function(index,value){
                            attr = '/' +options.transmonth+ day +'/cr'+'/'+value.Acccode.id;
                            var sccId = value.Acccode.id;
                            if (data[i][sccId]) {
                                str +=    '<td class="div-table-col" alt="'+attr+'">'+data[i][sccId]['amount']+'</td>';
                            } 
                            else {
                                str +=    '<td class="div-table-col" alt="'+attr+'"></td>';
                            }
                        })                
                        str += '</tr>'; 






                    }
               }
               




               // 2nd last row
               str += '<tr><td colspan="16" class="no_border">&nbsp;</td></tr>';
               str += '<tr>';
               str +=      '<td></td>';
               str +=      '<td><div align="left">JUMLAH</div></td>';
               if (data['final_masuk']) {
                    str +=     ' <td id="final_masuk">'+data['final_masuk']+'</td>';
               } 
               else {
                    str +=     ' <td id="final_masuk"></td>';
               }
               if(data['final_keluar']){
                    str +=     ' <td id="final_keluar">'+data['final_keluar']+'</td>';
               } 
               else {
                    str +=     ' <td id="final_keluar"></td>';
               }
               str +=      '<td class="no_border"></td>';
               str +=      '<td class="no_border"></td>';
           	    




                $.each(data['income'],function(index,value) {
                    if(data['final_acc']) {
                        var sccId = value.Acccode.id;
                        if(data['final_acc'][sccId]) {
                            str +=    '<td >'+data['final_acc'][sccId]+'</td>';
                        } 
                        else {
                            str +=    '<td ></td>';
                        }
                    } 
                    else {
                        str +=    '<td ></td>';
                    }
                })
                str +=      '<td class="no_border"></td>';




               
                $.each(data['expense'],function(index,value){
                    if(data['final_acc'] ){
                        var sccId = value.Acccode.id;
                        if(data['final_acc'][sccId]){
                            str +=    '<td >'+data['final_acc'][sccId]+'</td>';
                        } 
                        else {
                            str +=    '<td ></td>';
                        }
                    } 
                    else {
                        str +=    '<td ></td>';
                    }
                            
                })





               str += '</tr>';
               str += '<tr>';
               str +=      '<td class="no_border"></td>';
               str +=      '<td colspan="3" class="no_border"><div align="left">BAKI HANTAR HADAPAN</div></td>';
               




                if(data['final_bakiforward']){
                    str +=     ' <td id="final_baki_forward">'+data['final_bakiforward']+'</td>';
                } 
                else {
                    str +=     ' <td id="final_baki_forward"></td>';
                }
               





               
               str +=     ' <td colspan="" class="no_border"></td>';
               str +=  '</tr>';
               str += '</table>';
               var selEvent = options.event;
               $(selEvent).html(str);
               $('#show_loading').hide();
               





            },'json')
        });  
    },





    // list of yearly
    yearly : function( options ) {
        return this.each(function(){
            $('#show_loading').show();
            $.post(options.url,options,function(data){
                // console.log( data );                
                var str = '<table>';
                str += '<tr>';
                str += '<th>#</th>';
                str += '<th>Site</th>';
                str += '<th>Month</th>';
                str += '<th>Bf</th>';
                str += '<th>Debit</th>';
                str += '<th>Credit</th>';
                str += '<th>Balance</th>';
                str += '</tr>';
                var count =0;
                $.each(data,function(index,value) {
                    count += 1;
                   str += '<tr class="view_accdetail" alt="accdetail/'+ value['Accbalance']['sitecode'] +'/'+value['Accbalance']['transmonth']+'">';
                   str += '<td>'+ count + '</td>';
                   str += '<td><p align="left">'+ value['Site']['name'] +' ('+ value['Site']['id'] +')</p></td>';
                   str += '<td>'+ value['Accbalance']['transmonth'] +'</td>';
                   str += '<td>'+ value['Accbalance']['bf'] +'</td>';
                   str += '<td>'+ value['Accbalance']['dr'] +'</td>';
                   str += '<td>'+ value['Accbalance']['cr'] +'</td>';
                   str += '<td>'+ value['Accbalance']['bal']+'</td>';
                   str += '</tr>';
                });
                str += '</table>';
                var selEvent = options.event;
                $(selEvent).html(str); 
                $('#show_loading').hide();
            },'json');
            
            })
        },







    yearly_site : function( options ) {
        return this.each(function(){
            $('#show_loading').show();
            $.post(options.url,options,function(data){
                    //console.log( data );
                    
                    var str = '<table>';
                    str += '<tr>';
                    str += '<th>Month</th>';
                    str += '<th>Bf</th>';
                    str += '<th>Debit</th>';
                    str += '<th>Credit</th>';
                    str += '<th>Balance</th>';
                    str += '<th>Status</th>';
					str += '<th>Remark</th>';
                    str += '</tr>';
                    
                    var transmonth =0;
                    for (var i=1;i<=12;i++) {
                       
                        if(i < 10) {
                            transmonth = options.year + '0' + i; 
                        } else {
                            transmonth = options.year + i; 
                        }
                        
                        
                        if (data[transmonth]){
                            str += '<tr class="view_accdetail" alt="accdetail/'+ data[transmonth]['Accbalance']['sitecode'] +'/'+transmonth+'">';
                            str += '<td>'+ data[transmonth]['Accbalance']['transmonth'] +'</td>';
                            str += '<td>'+ data[transmonth]['Accbalance']['bf'] +'</td>';
                            str += '<td>'+ data[transmonth]['Accbalance']['dr'] +'</td>';
                            str += '<td>'+ data[transmonth]['Accbalance']['cr'] +'</td>';
                            str += '<td>'+ data[transmonth]['Accbalance']['bal']+'</td>';
                            str += '<td>'+ data[transmonth]['Accstatustitle']['name'] +'</td>';
							str += '<td>'+ data[transmonth]['Accbalance']['remark']+'</td>';
                            str += '</tr>'; 
                        } else {
                        str += '<tr class="view_accdetail" alt="accdetail/'+ options.sitecode +'/'+transmonth+'">';
                            str += '<td>'+ transmonth +'</td>';
                            str += '<td></td>';
                            str += '<td></td>';
                            str += '<td></td>';
                            str += '<td></td>';
                            str += '<td></td>';
							str += '<td></td>';
                            str += '</tr>'; 
                        }                        
                    }
                    
                    str += '</table>';
                    
                    var selEvent = options.event;
                    $(selEvent).html(str); 
                    $('#show_loading').hide();
                                   
                },'json');
            
            })
        },









        daily : function( options ) {
           // if(options.acccode_id){
             //   var postData = {sitecode : options.sitecode,transdate : options.transdate,acccode_id  : options.acccode_id};
          //  }else{
          //       var postData = {sitecode : options.sitecode,transdate : options.transdate};
          //  }
            $.post(options.url,options,function(data){
                console.log(data);
                
                var str = '<table>';
                str += '<tr>';
                str += '<th>#</th>'
                str += '<th>Transaction</th>'
                str += '<th>Masuk</th>'
                str += '<th>Keluar</th>'
                str += '<th></th>'
                str += '<th>File</th>'                
                str += '</tr>';
                
                var count = 0;
                var masuk =0;
                var keluar = 0;

                // alert(data['path']);

                $.each(data['sql'],function(index,value){

                    // alert(value[0]);

                    count++;
                    str += '<tr>';
                    str += '<td>'+count+'</td>';
                    
                    // alert(value.test1);
                    
                    if (value.Acctransaction.desc){
                       str += '<td>'+value.Acccode.name+'<br><i>'+value.Acctransaction.desc+'</i></td>'; 
                       
                    } 
                    else {
                        str += '<td>'+value.Acccode.name+'</td>';
                    }
                                       
                    if (value.Acctransaction.drcr == 'dr') {
                        str += '<td>'+value.Acctransaction.amount+'</td>';
                        str += '<td></td>';
                        masuk +=  parseFloat(value.Acctransaction.amount);
                    } 
                    else {
                        str += '<td></td>';
                        str += '<td>'+value.Acctransaction.amount+'</td>';
                        keluar +=  parseFloat(value.Acctransaction.amount);
                    }
                    str += '<td><a href="" class="editAcctransaction" alt="'+value.Acctransaction.id+'/'+value.Acctransaction.sitecode+'/'+value.Acctransaction.transdate+'/'+value.Acccode.parent_id+'">Edit</a>&nbsp;&nbsp;<a href="" class="delAcctransaction" alt="'+value.Acctransaction.id+'/'+value.Acctransaction.sitecode+'/'+value.Acctransaction.transdate+'" >Delete</a></td>';

                    if (value.Uploadfile.id) {
                        var att = '<a href="' + data['path'] + 'img/account/' + value.Uploadfile.file + '" target="_blank">View</a>&nbsp;<a href="" class="delAcctransactionFile" alt="'+value.Acctransaction.id+'/'+value.Acctransaction.transdate+'">Delete</a>';
                    }
                    else {
                        var att = '';
                    }
                    str += '<td>' + att + '</td>';
                    str += '</tr>';
                });
                

                str += '<td colspan="3">Total</td>';
                str += '<td>RM '+parseFloat(masuk).toFixed(2)+'</td>';
                str += '<td>RM '+parseFloat(keluar).toFixed(2)+'</td>';
                str += '<td></td>';        
                str += '</table>';
                
                str += '<input type="hidden" id="daily_sitecode" value="'+ options['sitecode'] +'"></input>';
                str += '<input type="hidden" id="daily_transdate" value="'+ options['transdate'] +'"></input>';
                if(options['acccode_id']){
                    str += '<input type="hidden" id="daily_acccode_id" value="'+ options['acccode_id'] +'"></input>';
                }
                
                str += '<input type="hidden" id="daily_drcr" value="'+ options['drcr'] +'"></input>';
                
                var selEvent = options.event;
                $(selEvent).html(str); 
            },'json')
        }
                
                
  };











$.fn.account = function(method) {
    // Method calling logic
    if (methods[method]) {
        methods[method].apply(this, Array.prototype.slice.call( arguments, 1));
    } 
    else if (typeof method === 'object' || ! method) {
        methods.init.apply(this, arguments);
    } 
    else {
        $.error('Method ' +  method + ' does not exist on jQuery.account');
    }    
};






})( jQuery );




