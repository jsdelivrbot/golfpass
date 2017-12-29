<style>


/* -------------------- Select Box Styles: stackoverflow.com Method */
/* -------------------- Source: http://stackoverflow.com/a/5809186 */
select#soflow, select#soflow-color {
   -webkit-appearance: button;
   -webkit-border-radius: 2px;
   -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
   -webkit-padding-end: 20px;
   -webkit-padding-start: 2px;
   -webkit-user-select: none;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
   background-position: 97% center;
   background-repeat: no-repeat;
   border: 1px solid #AAA;
   color: #555;
   font-size: inherit;
   margin: 20px;
   overflow: hidden;
   padding: 5px 10px;
   text-overflow: ellipsis;
   white-space: nowrap;
   width: 300px;
}

select#soflow-color
 {
   color: #fff;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#779126, #779126 40%, #779126);
   background-color: #779126;
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
   padding-left: 15px;
}

</style>

<!--
  ** Style a Select Box Using Only CSS
  ** Source: http://bavotasan.com/2011/style-select-box-using-only-css/
  ** Source: http://danielneumann.com/blog/how-to-style-dropdown-with-css-only/
  ** Source: http://stackoverflow.com/a/5809186
-->

<div>
<select>
  <option>Here is the unstyled select box</option>
  <option>The second option</option>
  <option>The third option</option>
</select>
</div>

<hr>

<div class="styled-select slate">
<select>
  <option>Here is the first option</option>
  <option>The second option</option>
  <option>The third option</option>
</select>
</div>

<hr>

<div class="styled-select black rounded">
<select>
  <option>Here is the first option</option>
  <option>The second option</option>
  <option>The third option</option>
</select>
</div>

<div class="styled-select green rounded">
<select>
  <option>Here is the first option</option>
  <option>The second option</option>
  <option>The third option</option>
</select>
</div>

<div class="styled-select blue semi-square">
<select>
  <option>Here is the first option</option>
  <option>The second option</option>
  <option>The third option</option>
</select>
</div>

<div class="styled-select yellow rounded">
<select>
  <option>Here is the first option</option>
  <option>The second option</option>
  <option>The third option</option>
</select>
</div>

<hr>

<div id="mainselection">
<select>
  <option>Select an Option</option>
  <option>Option 1</option>
  <option>Option 2</option>
</select>
</div>

<hr>

<select id="soflow">
<!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
<option>Select an Option</option>
<option>Option 1</option>
<option>Option 2</option>
</select>

<select id="soflow-color">
<!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
<option>Select an Option</option>
<option>Option 1</option>
<option>Option 2</option>
</select>