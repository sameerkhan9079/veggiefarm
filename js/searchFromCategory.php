<script>
      //  search items start for items page


const glass1 = document.querySelector('.fa-magnifying-glass');
const searchBox1 = document.querySelector('.nav-search input');
const searchItems1 = [
  'apple', 'grapes', 'pomegranate', 'banana', 'papaya', 'sapota',
  'kiwi', 'melon', 'orange', 'muskmelon', 'pear', 'pineapple','mango',
  'strawberry', 'black grapes',
  'potato',
  'onion','tomato',
  'cucumber','capsicum','chilli','carrot','red beet','radish','cabbage','qauliflower','broccoli','spanich','coriander','papermint','peas','okra','brinjal'
];
const searchButton1=()=>{
glass1.addEventListener("click", () => {
  // alert('hello');
  const searchTerm = searchBox1.value.toLowerCase().trim();
  if (searchItems1.includes(searchTerm)) {
    if (['apple', 'grapes', 'pomegranate'].includes(searchTerm)) {
      window.location.href = '../fruits/apple_pom.php';
    } else if (['banana', 'papaya', 'sapota'].includes(searchTerm)) {
      window.location.href = "../fruits/banana.php";
    } else if (['kiwi', 'melon', 'orange'].includes(searchTerm)) {
      window.location.href = "../fruits/kiwi.php";
    } else if (['muskmelon', 'pear'].includes(searchTerm)) {
      window.location.href = "../fruits/seasonal.php";
    } else if (searchTerm === 'mango') {
      window.location.href = "../fruits/mango.php";
    } else if (['pineapple', 'strawberry', 'black grapes'].includes(searchTerm)) {
      window.location.href = "../fruits/organic_fruit.php";
    }
    //for vegetables
   else if (['potato', 'onion','tomato'].includes(searchTerm)) {
      window.location.href = "../vegetables/potato_onions.php";
    } else if (['cucumber','capsicum','chilli'].includes(searchTerm)) {
      window.location.href = "../vegetables/cucumber_cap.php";
    } else if (['red beet', 'carrot', 'radish'].includes(searchTerm)) {
      window.location.href = "../vegetables/root_veg.php";
    } else if (['cabbige', 'qauliflower','broccoli'].includes(searchTerm)) {
      window.location.href = "../vegetables/cabb.php";
    } 
     else if (['spanich', 'coriander', 'papermint'].includes(searchTerm)) {
      window.location.href = "../vegetables/leafy.php";
    }
     else if (['peas', 'okra', 'brinjal'].includes(searchTerm)) {
      window.location.href = "../vegetables/peas_okra.php";
      }
  }
});
}
searchButton1();
//  search items end for items page
    </script>