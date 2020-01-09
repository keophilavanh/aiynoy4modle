var a = ['','ໜຶ່ງ','ສອງ','ສາມ','ສີ່', 'ຫ້າ','ຫົກ','ເຈັດ','ແປດ','ເກົ້າ','ສິບ','ສິບເອັດ','ສິບສອງ','ສິບສາມ','ສິບສີ່','ສິບຫ້າ','ສິບຫົກ','ສິບເຈັດ','ສິບແປດ','ສິບເກົ້າ'];
var b = ['', '', 'ຊາວ','ສາມສິບ','ສີ່ສິບ','ຫ້າສິບ', 'ຫົກສິບ','ເຈັດສິບ','ແປດສິບ','ເກົ້າສິບ'];

function inWords (num) {
if ((num = num.toString()).length > 9) return 'overflow';
n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
if (!n) return; var str = '';

str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + a[n[4][1]]) + 'ຮ້ອຍ' : '';
str += (n[5] != 0) ? ((str != '') ? '' : '') + (a[Number(n[5])] || b[n[5][0]] + a[n[5][1]])  : '';
return str;
 
}
function inWords2 (num) {
if ((num = num.toString()).length > 9) return 'overflow';
n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
if (!n) return; var str = '';

str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + a[n[4][1]]) + 'ແສນ' : '';
str += (n[5] != 0) ? ((str != '') ? '' : '') + (a[Number(n[5])] || b[n[5][0]] + a[n[5][1]])  : '';
return str;
 
}



function conver_number_to_string_text(number) {
    
    //console.log(new Intl.NumberFormat('ja-JP').format(parseInt(number)));
    return new Intl.NumberFormat('ja-JP').format(number);
}

function text_number_to_string(num) {
var str;
if((num = num.toString()).length > 10) return 'overflow';

n =  conver_number_to_string_text(num);
var obj = n.split(",");
console.log(obj);
console.log(obj.length);





if(obj.length == 4){
   
    console.log('4');



    str = inWords(obj[0]);
    str +='ພັນ';
    str += inWords(obj[1]);
    str +='ລ້ານ';
    str += inWords2(obj[2]);
    if(obj[2].substring(1, 3) != "00"){
        str +='ພັນ';
       
    }

    str += inWords(obj[3]);
  
    
}else if(obj.length == 3){
   
    console.log('3');
    str = inWords(obj[0]);
    str +='ລ້ານ';
    str += inWords2(obj[1]);
    if(obj[1].substring(1, 3) != "00"){
        str +='ພັນ';
       
    }else{
        console.log(obj[1].substring(1, 3));
    }

   
    str += inWords(obj[2]);
  
    
}else if(obj.length == 2){
   

    str = inWords2(obj[0]);
    if(obj[0].substring(1, 3) != "00"){
        str +='ພັນ';
    }else{
        console.log('ພັນ');
        console.log(obj[0].substring(1, 3));
    }
    str += inWords(obj[1]);
}
else{
    console.log('else');
    str = inWords(obj[0]);
}


  return str;
}