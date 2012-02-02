<?php
	if (isset($params['example_syntax'])) 
	{
		$this -> SetPreference('example_syntax', $params['example_syntax']);
	}
		$this -> smarty -> assign('startform', $this -> CreateFormStart($id, 'savesettings', $returnid));
		$this -> smarty -> assign('endform', $this -> CreateFormEnd());
		$this -> smarty -> assign('settingstext', $this -> Lang('settings_tab'));

		$smarty->assign('width_title', $this -> Lang('width_title'));
		$smarty->assign('width_input', $this->CreateInputText($id, 'width', $this -> GetPreference('width', '80'), 10, 255));		
		$smarty->assign('height_title', $this -> Lang('height_title'));
		$smarty->assign('height_input', $this->CreateInputText($id, 'height', $this -> GetPreference('height', '40'), 10, 255));
		// create a IE pref, DONT WANT TO SEE A BR FOR THIS SHIT!
		$this -> smarty -> assign('enable_ietext', $this -> Lang('enable_ie'));
		$this -> smarty -> assign('enable_iedescr', $this -> Lang('enable_iedescription'));
		$this -> smarty -> assign('enable_ieinput', $this -> CreateInputCheckbox($id, 'enable_ie', 1, $this -> GetPreference('enable_ie', 1)));

		$this -> smarty -> assign('use_uncompressed_title', $this -> Lang('use_uncompressed'));
		$this -> smarty -> assign('use_uncompressed_text', $this -> Lang('use_uncompressed_text'));
		$this -> smarty -> assign('use_uncompressed_input', $this -> CreateInputCheckbox($id, 'use_uncompressed', 1, $this -> GetPreference('use_uncompressed', 0)));

		/* mode dropdown */
		$this -> smarty -> assign('syntax_mode', $this -> Lang('syntax_mode'));
			$modes = array(
				$this -> Lang('js') => 'javascript', 
				$this -> Lang('plain') => 'plain', 
				$this -> Lang('svg') => 'svg', 
				$this -> Lang('html') => 'html',
				$this -> Lang('css') => 'css',
				$this -> Lang('scss') => 'scss',
				$this -> Lang('coffee') => 'coffee',
				$this -> Lang('json') => 'json',
				$this -> Lang('python') => 'python',
				$this -> Lang('ruby') => 'ruby',
				$this -> Lang('perl') => 'perl',
				$this -> Lang('php') => 'php',
				$this -> Lang('java') => 'java',
				$this -> Lang('csharp') => 'csharp',
				$this -> Lang('c_cpp') => 'c_cpp',
				$this -> Lang('clojure') => 'clojure',
				$this -> Lang('ocaml') => 'ocaml',
				$this -> Lang('textile') => 'textile',
				$this -> Lang('groovy') => 'groovy',
				$this -> Lang('scala') => 'scala'
				);	
		$this -> smarty -> assign('syntax_modeinput', $this -> CreateInputDropdown($id, 'mode', $modes, -1, $this -> GetPreference('mode', 'html'),'onchange="this.form.submit()"'));				

		/* themes */		
		$this -> smarty -> assign('themetext', $this -> Lang('themes'));
			$themes = array(
				$this -> Lang('chrome') => 'chrome', 
				$this -> Lang('clouds') => 'clouds', 
				$this -> Lang('clouds_midnight') => 'clouds_midnight', 
				$this -> Lang('cobalt') => 'cobalt', 
				$this -> Lang('crimson_editor') => 'crimson_editor',
				$this -> Lang('dawn') => 'dawn',
				$this -> Lang('dreamweaver') => 'dreamweaver', 
				$this -> Lang('eclipse') => 'eclipse',
				$this -> Lang('idle_fingers') => 'idle_fingers',
				$this -> Lang('kr_theme') => 'kr_theme',
				$this -> Lang('merbivore') => 'merbivore',
				$this -> Lang('merbivore_soft') => 'merbivore_soft',
				$this -> Lang('mono_industrial') => 'mono_industrial',
				$this -> Lang('monokai') => 'monokai',
				$this -> Lang('pastel_on_dark') => 'pastel_on_dark',
				$this -> Lang('solarized_dark') => 'solarized_dark',
				$this -> Lang('solarized_light') => 'solarized_light',
				$this -> Lang('textmate') => 'textmate',
				$this -> Lang('tomorrow') => 'tomorrow',
				$this -> Lang('tomorrow_night') => 'tomorrow_night',
				$this -> Lang('tomorrow_night_blue') => 'tomorrow_night_blue',
				$this -> Lang('tomorrow_night_bright') => 'tomorrow_night_bright',
				$this -> Lang('tomorrow_night_eighties') => 'tomorrow_night_eighties',				
				$this -> Lang('twilight') => 'twilight',
				$this -> Lang('vibrant_ink') => 'vibrant_ink'		
			);
		$this -> smarty -> assign('themeinput', $this -> CreateInputDropdown($id, 'theme', $themes, -1, $this -> GetPreference('theme', 'textmate'),'onchange="this.form.submit()"'));

		/* font size */
		$this -> smarty -> assign('fontsizetext', $this -> Lang('font_size'));
			$fonts = array(
				'10px' => '10px', 
				'11px' => '11px', 
				'12px' => '12px', 
				'14px' => '14px',
				'16px' => '16px',
				'20px' => '20px',
				'24px' => '24px'
			);
		$this -> smarty -> assign('fontsizeinput', $this -> CreateInputDropdown($id, 'fontsize', $fonts, -1, $this -> GetPreference('fontsize', '12px')));		

		$this -> smarty -> assign('full_linetext', $this -> Lang('full_line'));
		$this -> smarty -> assign('full_lineinput', $this -> CreateInputCheckbox($id, 'full_line', 1, $this -> GetPreference('full_line', 1)));
		$this -> smarty -> assign('highlight_activetext', $this -> Lang('highlight_active'));
		$this -> smarty -> assign('highlight_activeinput', $this -> CreateInputCheckbox($id, 'highlight_active', 1, $this -> GetPreference('highlight_active', 1)));
		$this -> smarty -> assign('show_invisiblestext', $this -> Lang('show_invisibles'));
		$this -> smarty -> assign('show_invisiblesinput', $this -> CreateInputCheckbox($id, 'show_invisibles', 1, $this -> GetPreference('show_invisibles', 1)));	
		$this -> smarty -> assign('persistent_hscrolltext', $this -> Lang('persistent_hscroll'));
		$this -> smarty -> assign('persistent_hscrollinput', $this -> CreateInputCheckbox($id, 'persistent_hscroll', 1, $this -> GetPreference('persistent_hscroll', 1)));

		/* text wrapping */
		$this -> smarty -> assign('soft_wraptext', $this -> Lang('soft_wrap'));
			$soft_wrap = array(
				$this -> Lang('off') => 'off', 
				$this -> Lang('40') => '40,40', 
				$this -> Lang('80') => '80,80',
				$this -> Lang('100') => '100,100',
				$this -> Lang('140') => '140,140'
			);
		$this -> smarty -> assign('soft_wrapinput', $this -> CreateInputDropdown($id, 'soft_wrap', $soft_wrap, -1, $this -> GetPreference('soft_wrap', '80,80')));

		$this -> smarty -> assign('show_guttertext', $this -> Lang('show_gutter'));
		$this -> smarty -> assign('show_gutterinput', $this -> CreateInputCheckbox($id, 'show_gutter', 1, $this -> GetPreference('show_gutter', 1)));	
		$this -> smarty -> assign('print_margintext', $this -> Lang('print_margin'));
		$this -> smarty -> assign('print_margininput', $this -> CreateInputCheckbox($id, 'print_margin', 1, $this -> GetPreference('print_margin', 1)));
		$this -> smarty -> assign('soft_tabtext', $this -> Lang('soft_tab'));
		$this -> smarty -> assign('soft_tabinput', $this -> CreateInputCheckbox($id, 'soft_tab', 1, $this -> GetPreference('soft_tab', 1)));
		$this -> smarty -> assign('highlight_selectedtext', $this -> Lang('highlight_selected'));
		$this -> smarty -> assign('highlight_selectedinput', $this -> CreateInputCheckbox($id, 'highlight_selected', 1, $this -> GetPreference('highlight_selected', 1)));	

		$this -> smarty -> assign('submit', $this -> CreateInputSubmit($id, 'submit', $this -> Lang('savesettings')));
		
		/* sample content */
		$syntax_content = '';
		switch ($this->GetPreference('mode','html')) {
			case 'html' : {
				$syntax_content = "
<html>
<head>

<style type=\"text/css\">
.text-layer {
    font-family: Monaco, \"Courier New\", monospace;
    font-size: 12px;
    cursor: text;
}
</style>

</head>
<body>
    <h1 style=\"color:red\">Juhu Kinners</h1>
</body>
</html>
				";
				break;
			}
			case 'css' : {
				$syntax_content = "
.text-layer {
    font-family: Monaco, \"Courier New\", monospace;
    font-size: 12px;
    cursor: text;
}				";
				break;
			}
			case 'javascript' : {
				$syntax_content = "
function foo(items) {
    for (var i=0; i<items.length; i++) {
        alert(items[i] + \"juhu\");
    }	// Real Tab.
}				";
				break;
			}
			case 'plain' : {
				$syntax_content = "
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.

Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
				";
				break;
			}
			case 'svg' : {
				$syntax_content = "
<svg
  width=\"800\" height=\"600\"
  xmlns=\"http://www.w3.org/2000/svg\"
  onload=\"StartAnimation(evt)\">

  <title>Test Tube Progress Bar</title>
  <desc>Created for the Web Directions SVG competition</desc>

  <script type=\"text/ecmascript\"><![CDATA[
    var timevalue = 0;
    var timer_increment = 1;
    var max_time = 100;
    var hickory;
    var dickory;
    var dock;
    var i;

    function StartAnimation(evt) {
        hickory  = evt.target.ownerDocument.getElementById(\"hickory\");
        dickory = evt.target.ownerDocument.getElementById(\"dickory\");
        dock = evt.target.ownerDocument.getElementById(\"dock\");

        ShowAndGrowElement();
    }
    function ShowAndGrowElement() {
        timevalue = timevalue + timer_increment;
        if (timevalue > max_time)
            return;
        // Scale the text string gradually until it is 20 times larger
        scalefactor = (timevalue * 650) / max_time;

        if (timevalue < 30) {
            hickory.setAttribute(\"display\", \"\");
            hickory.setAttribute(\"transform\", \"translate(\" + (600+scalefactor*3*-1 ) + \", -144 )\");
        }

        if (timevalue > 30 && timevalue < 66) {
            dickory.setAttribute(\"display\", \"\");
            dickory.setAttribute(\"transform\", \"translate(\" + (-795+scalefactor*2) + \", 0 )\");
        }
        if (timevalue > 66) {
            dock.setAttribute(\"display\", \"\");
            dock.setAttribute(\"transform\", \"translate(\" + (1450+scalefactor*2*-1) + \", 144 )\");
        }

        // Call ShowAndGrowElement again <timer_increment> milliseconds later.
        setTimeout(\"ShowAndGrowElement()\", timer_increment)
    }
    window.ShowAndGrowElement = ShowAndGrowElement
  ]]></script>

  <rect
    fill=\"#2e3436\"
    fill-rule=\"nonzero\"
    stroke-width=\"3\"
    y=\"0\"
    x=\"0\"
    height=\"600\"
    width=\"800\"
    id=\"rect3590\"/>

    <text
       style=\"font-size:144px;font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;fill:#000000;fill-opacity:1;stroke:none;font-family:Bitstream Vera Sans;-inkscape-font-specification:Bitstream Vera Sans Bold\"
       x=\"50\"
       y=\"350\"
       id=\"hickory\"
       display=\"none\">
        Hickory,</text>
    <text
       style=\"font-size:144px;font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;fill:#000000;fill-opacity:1;stroke:none;font-family:Bitstream Vera Sans;-inkscape-font-specification:Bitstream Vera Sans Bold\"
       x=\"50\"
       y=\"350\"
       id=\"dickory\"
       display=\"none\">
        dickory,</text>
    <text
       style=\"font-size:144px;font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;fill:#000000;fill-opacity:1;stroke:none;font-family:Bitstream Vera Sans;-inkscape-font-specification:Bitstream Vera Sans Bold\"
       x=\"50\"
       y=\"350\"
       id=\"dock\"
       display=\"none\">
        dock!</text>
</svg>			";
				break;
			}
			case 'scss' : {
				$syntax_content = "
/* style.scss */

#navbar {
    \$navbar-width: 800px;
    \$items: 5;
    \$navbar-color: #ce4dd6;

    width: \$navbar-width;
    border-bottom: 2px solid \$navbar-color;

    li {
        float: left;
        width: \$navbar-width/\$items - 10px;

        background-color: lighten(\$navbar-color, 20%);
        &:hover {
            background-color: lighten(\$navbar-color, 10%);
        }
    }
}				";
				break;
			}
			case 'coffee' : {
				$syntax_content = "
#!/usr/bin/env coffee

try
    throw URIError decodeURI(0xC0ffee * 123456.7e-8 / .9)
catch e
    console.log 'qstring' + \"qqstring\" + '''
        qdoc
    ''' + \"\"\"
        qqdoc
    \"\"\"

do ->
    ###
    herecomment
    ###
    re = /regex/imgy.test ///
        heregex  # comment
    ///imgy
    this isnt: `just JavaScript`
    undefined				
    			";
				break;
			}
			case 'json' : {
				$syntax_content = "
{
 \"query\": {
  \"count\": 10,
  \"created\": \"2011-06-21T08:10:46Z\",
  \"lang\": \"en-US\",
  \"results\": {
   \"photo\": [
    {
     \"farm\": \"6\",
     \"id\": \"5855620975\",
     \"isfamily\": \"0\",
     \"isfriend\": \"0\",
     \"ispublic\": \"1\",
     \"owner\": \"32021554@N04\",
     \"secret\": \"f1f5e8515d\",
     \"server\": \"5110\",
     \"title\": \"7087 bandit cat\"
    },
    {
     \"farm\": \"4\",
     \"id\": \"5856170534\",
     \"isfamily\": \"0\",
     \"isfriend\": \"0\",
     \"ispublic\": \"1\",
     \"owner\": \"32021554@N04\",
     \"secret\": \"ff1efb2a6f\",
     \"server\": \"3217\",
     \"title\": \"6975 rusty cat\"
    },
    {
     \"farm\": \"6\",
     \"id\": \"5856172972\",
     \"isfamily\": \"0\",
     \"isfriend\": \"0\",
     \"ispublic\": \"1\",
     \"owner\": \"51249875@N03\",
     \"secret\": \"6c6887347c\",
     \"server\": \"5192\",
     \"title\": \"watermarked-cats\"
    },
    {
     \"farm\": \"6\",
     \"id\": \"5856168328\",
     \"isfamily\": \"0\",
     \"isfriend\": \"0\",
     \"ispublic\": \"1\",
     \"owner\": \"32021554@N04\",
     \"secret\": \"0c1cfdf64c\",
     \"server\": \"5078\",
     \"title\": \"7020 mandy cat\"
    },
    {
     \"farm\": \"3\",
     \"id\": \"5856171774\",
     \"isfamily\": \"0\",
     \"isfriend\": \"0\",
     \"ispublic\": \"1\",
     \"owner\": \"32021554@N04\",
     \"secret\": \"7f5a3180ab\",
     \"server\": \"2696\",
     \"title\": \"7448 bobby cat\"
    }
   ]
  }
 }
}				";
				break;
			}
			case 'python' : {
				$syntax_content = "
#!/usr/local/bin/python

import string, sys

# If no arguments were given, print a helpful message
if len(sys.argv)==1:
    print 'Usage: celsius temp1 temp2 ...'
    sys.exit(0)

# Loop over the arguments
for i in sys.argv[1:]:
    try:
        fahrenheit=float(string.atoi(i))
    except string.atoi_error:
        print repr(i), \"not a numeric value\"	
    else:
        celsius=(fahrenheit-32)*5.0/9.0
        print '%i\\260F = %i\\260C' % (int(fahrenheit), int(celsius+.5))
        		";
				break;
			}
			case 'php' : {
				$syntax_content = "
<?php

function nfact(\$n) {
  if (\$n == 0) {
    return 1;
  }
  else {
    return \$n * nfact(\$n - 1);
  }
}

echo \"\\n\\nPlease enter a whole number ... \";
\$num = trim(fgets(STDIN));

// ===== PROCESS - Determing the factorial of the input number =====
\$output = \"\\n\\nFactorial \" . \$num . \" = \" . nfact(\$num) . \"\\n\\n\";
echo \$output;

?>
				";
				break;
			}
			case 'ruby' : {
				$syntax_content = "
#!/usr/bin/ruby

# Program to find the factorial of a number
def fact(n)
    if n == 0
        1
    else
        n * fact(n-1)
    end
end

puts fact(ARGV[0].to_i)
				";
				break;
			}
			case 'perl' : {
				$syntax_content = "
#!/usr/bin/perl
use strict;
use warnings;
my \$num_primes = 0;
my @primes;

# Put 2 as the first prime so we won't have an empty array
\$primes[\$num_primes] = 2;
\$num_primes++;

MAIN_LOOP:
for my \$number_to_check (3 .. 200)
{
    for my \$p (0 .. (\$num_primes-1))
    {
        if (\$number_to_check % \$primes[\$p] == 0)
        {
            next MAIN_LOOP;
        }
    }

    # If we reached this point it means \$number_to_check is not
    # divisable by any prime number that came before it.
    \$primes[\$num_primes] = \$number_to_check;
    \$num_primes++;
}

for my \$p (0 .. (\$num_primes-1))
{
    print \$primes[\$p], \", \";
}
print \"\\n\";
				";
				break;
			}
			case 'java' : {
				$syntax_content = "
public class InfiniteLoop {

    /*
     * This will cause the program to hang...
     *
     * Taken from:
     * http://www.exploringbinary.com/java-hangs-when-converting-2-2250738585072012e-308/
     */
    public static void main(String[] args) {
        double d = Double.parseDouble(\"2.2250738585072012e-308\");

        // unreachable code
        System.out.println(\"Value: \" + d);
    }
}
				";
				break;
			}
			case 'csharp' : {
				$syntax_content = "
public void HelloWorld() {
   //Say Hello!
   Console.WriteLine(\"Hello World\");
}				
				";
				break;
			}
			case 'c_cpp' : {
				$syntax_content = "
// compound assignment operators

#include <iostream>
using namespace std;

int main ()
{
    int a, b=3; /* foobar */
    a = b;
    a+=2; // equivalent to a=a+2
    cout << a;
    return 0;
}				
				";
				break;
			}
			case 'clojure' : {
				$syntax_content = "
(defn parting
  \"returns a String parting in a given language\"
  ([] (parting \"World\"))
  ([name] (parting name \"en\"))
  ([name language]
    ; condp is similar to a case statement in other languages.
    ; It is described in more detail later.
    ; It is used here to take different actions based on whether the
    ; parameter \"language\" is set to \"en\", \"es\" or something else.
    (condp = language
      \"en\" (str \"Goodbye, \" name)
      \"es\" (str \"Adios, \" name)
      (throw (IllegalArgumentException.
        (str \"unsupported language \" language))))))

(println (parting)) ; -> Goodbye, World
(println (parting \"Mark\")) ; -> Goodbye, Mark
(println (parting \"Mark\" \"es\")) ; -> Adios, Mark
(println (parting \"Mark\", \"xy\")) ; -> java.lang.IllegalArgumentException: unsupported language xy				
				";
				break;
			}
			case 'ocaml' : {
				$syntax_content = "
(*
 * Example of early return implementation taken from
 * http://ocaml.janestreet.com/?q=node/91
 *)

let with_return (type t) (f : _ -> t) =
  let module M =
     struct exception Return of t end
  in
  let return = { return = (fun x -> raise (M.Return x)); } in
  try f return with M.Return x -> x


(* Function that uses the 'early return' functionality provided by `with_return` *)
let sum_until_first_negative list =
  with_return (fun r ->
    List.fold list ~init:0 ~f:(fun acc x ->
      if x >= 0 then acc + x else r.return acc))				
				";
				break;
			}
			case 'textile' : {
				$syntax_content = "
h1. Textile document

h2. Heading Two

h3. A two-line
    header

h2. Another two-line
header

Paragraph:
one, two,
thee lines!

p(classone two three). This is a paragraph with classes

p(#id). (one with an id)

p(one two three#my_id). ..classes + id

* Unordered list
** sublist
* back again!
** sublist again..

# ordered

bg. Blockquote!
    This is a two-list blockquote..!				
				";
				break;
			}
			case 'groovy' : {
				$syntax_content = "

//http://groovy.codehaus.org/Concurrency+with+Groovy
import java.util.concurrent.atomic.AtomicInteger

def counter = new AtomicInteger()

synchronized out(message) {
    println(message)
}

def th = Thread.start {
    for( i in 1..8 ) {
        sleep 30
        out \"thread loop \$i\"
        counter.incrementAndGet()
    }
}

for( j in 1..4 ) {
    sleep 50
    out \"main loop \$j\"
    counter.incrementAndGet()
}

th.join()

assert counter.get() == 12
				
				";
				break;
			}
			case 'scala' : {
				$syntax_content = "
//http://www.scala-lang.org/node/227
/* Defines a new method 'sort' for array objects */
object implicits extends Application {
  implicit def arrayWrapper[A : ClassManifest](x: Array[A]) =
    new {
      def sort(p: (A, A) => Boolean) = {
        util.Sorting.stableSort(x, p); x
      }
    }
  val x = Array(2, 3, 1, 4)
  println(\"x = \"+ x.sort((x: Int, y: Int) => x < y))
}				
				";
				break;
			} 
		}	
		
		/* create test textarea */
		$this -> smarty -> assign('testareatext', $this -> Lang('testareatext'));
		$this -> smarty -> assign('testarea', $this -> CreateTextArea(false,$id,$syntax_content,'testarea','','','','','','','AceEditor',$this->GetPreference(
		'mode',
		'theme',
		'fontsize',
		'full_line',
		'highlight_active',
		'show_invisibles',
		'persisten_hscroll',
		'keybinding',
		'soft_wrap',
		'show_gutter',
		'print_margin',
		'soft_tab',
		'highlight_selected',
		'enable_behaviors'
		)));
		
	/* ProcessTempalte */
	echo $this -> ProcessTemplate('settings.tpl');

?>	