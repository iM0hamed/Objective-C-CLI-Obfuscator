Objective-C CLI Obfuscator for Methods,IVars and Classes
===========================================
This is fork of fork of original [class-dump](https://github.com/nygard/class-dump) I have improved obfuscation which makes all obfuscated items the same lenght with random characters so analyzing binary is much harder than in previous fork. It also contains few fixes.<br><br>

### Apple Review Problems
Some users reported that binary obfuscated with this software caused Apple Review rejection, apple review team dump your all classes names, ivars, selectors and check if you don't hide something, it's stupid since it can be hidden anyway. Usually you will be able to submit app obfuscated with it, but if you encounter on stubborn Apple reviewer then your app will be rejected and it will be hard to resubmit even without obfuscation since they will assume that your app hide something like using their private api to do nasty things, they don't care it's security measure to lift up bar for attacker. Check branch [apple-review-safe](https://github.com/karek314/Objective-C-CLI-Obfuscator/tree/apple-review-safe) it's safer to use, it does not bring as much attention as this version when each symbol is 64 character length random meaningless string.

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
<br>It can generate huge tree of methods which each one will return previous one, then the last one can do the job you want, this principle can be used to manipulate output in each function in tree, so reverse engineering will be harder, rewriting assembly code from one function is simpler and faster then reversing many small functions.
