<table>
{foreach $names as $name}
{strip}
   <tr bgcolor="{cycle values="#eeeeee,#dddddd"}">
      <td>{$name}</td>
   </tr>
{/strip}
{/foreach}
</table>

<table>
{foreach $users as $user}
{strip}
   <tr bgcolor="{cycle values="#aaaaaa,#bbbbbb"}">
      <td>{$user.name}</td>
      <td>{$user.phone}</td>
   </tr>
{/strip}
{/foreach}
</table>