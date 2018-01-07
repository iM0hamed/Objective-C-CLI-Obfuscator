Objective-C CLI Obfuscator for Methods,IVars and Classes
===========================================
This is fork of fork. I have improved obfuscation which makes all obfuscated items the same lenght with random characters so analyzing binary is much harder than in previous fork. It also contains few fixes.<br><br>

<h2>Apple Review Problems</h2>
This caused multiple developer accounts suspension. This shouldn't be used with applications targeted to apple, as obfuscation in Apple Appstore is only for chosen ones.

## How it works ?
It works by generating a special set of `#define` statements (e.g. `#define generatePrivateKey qRAu8sjFRoba9UOokMqsOrWabeiCV00fk2GPxznUzvV3kAHKSkN5UfTFlAIvJrtR`) that automatically rename symbols during compilation.<br><br>

## Usage
1.Download and build this project and copy generated binary to `/usr/local/bin`<br>
2.Make sure your project have [PrefixHeader](https://stackoverflow.com/questions/24158648/why-isnt-projectname-prefix-pch-created-automatically-in-xcode-6) generated.<br>
3.Build your application<br>
4.Take your *.app direcrtly from Products directory from Xcode<br>
5.`ppios-rename --analyze --symbols-map symbols.map YOUR_APP.app`<br>
6.Move symbols.map to your project directory to subfolder with all classes<br>
7.Backup storyboards in separate directory<br>
8.cd to this directory and run `ppios-rename --obfuscate-sources --symbols-map symbols.map`<br>
<br>
<br>
Optionaly, if you want to make a little mess in code. <br>You can optionally use `method_tree.php` PHP CLI tool
<br>`Valid options:`
<br>`code - generates obj-c code`
<br>`list PREFIX - generates list of methods`
<br>It can generate huge tree of methods which each one will return previous one, then the last one can do the job you want, this principle can be used to manipulate output in each function in tree, so reverse engineering will be harder, rewriting assembly code from one function is simpler and faster than reversing many small functions.
