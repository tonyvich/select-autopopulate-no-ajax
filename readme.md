# Autopopulate your select input without using ajax

### Description
This small tool allow you to link two or more select and dynamically fill their content when the parent value change.
To make it work you should have JQuery enabled in your page.

### How to use
The child dropdow option should have a 'parent-option' attribute wich refer to the value of the parent option

Eg: for Continent and country linked selects, we should have
```html
<!-- The parent select -->
<select name="parent_select" id="parentSelect">
    <option value="africa">Africa</option>
    <option value="asia">Asia</option>
    <option value="europe">Europe</option>
    <option value="north-america">North America</option>
    <option value="south-america">South America</option>
</select>
<!-- The child select -->
<select name="child_select" id="childSelect">
    <option parent-option="africa" value="angola">Angola</option>
    <option parent-option="africa" value="cameroon">Cameroon</option>
    <option parent-option="africa" value="nigeria">Nigeria</option>
    <option parent-option="africa" value="south-africa">South Africa</option>
    <option parent-option="asia" value="china">China</option>
    <option parent-option="asia" value="japan">Japan</option>
    <option parent-option="asia" value="russia">Russia</option>
    <option parent-option="europe" value="france">France</option>
    <option parent-option="europe" value="france">Germany</option>
    <option parent-option="europe" value="spain">Spain</option>
    <option parent-option="north-america" value="usa">USA</option>
    <option parent-option="north-america" value="canada">Canada</option>
</select>
```
And now you only have to initialize it
```javascript
$(document).ready( function(){
    $("#parentSelect").autopopulatedselect("#childSelect");
});
```
### License
The code is under the GPL (GNU Public license) You can do everything allowed by the license with it
https://www.gnu.org/licenses/gpl-3.0.fr.html

### Issue
Please Kindly report any issue encountered using this tool via Github Issue

### Need More?
I'm available for any tasks regarding web development just mail me at tinyskillz69@gmail.com