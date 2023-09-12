<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Navigation</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="http://127.0.0.1:8000/css/navigation.css" rel="stylesheet">
  <style>/* ! tailwindcss v3.3.3 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.mx-auto{margin-left:auto;margin-right:auto}.mr-3{margin-right:0.75rem}.mt-0{margin-top:0px}.mt-4{margin-top:1rem}.flex{display:flex}.hidden{display:none}.h-8{height:2rem}.w-8{width:2rem}.w-full{width:100%}.flex-none{flex:none}.flex-col{flex-direction:column}.flex-wrap{flex-wrap:wrap}.items-center{align-items:center}.justify-between{justify-content:space-between}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.border{border-width:1px}.border-gray-100{--tw-border-opacity:1;border-color:rgb(243 244 246 / var(--tw-border-opacity))}.border-gray-200{--tw-border-opacity:1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.bg-gray-50{--tw-bg-opacity:1;background-color:rgb(249 250 251 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.p-1{padding:0.25rem}.p-4{padding:1rem}.px-4{padding-left:1rem;padding-right:1rem}.pb-0{padding-bottom:0px}.pb-5{padding-bottom:1.25rem}.pb-6{padding-bottom:1.5rem}.pl-4{padding-left:1rem}.pr-4{padding-right:1rem}.pt-5{padding-top:1.25rem}.text-center{text-align:center}.font-medium{font-weight:500}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}@media (prefers-color-scheme: dark){.dark\:border-gray-700{--tw-border-opacity:1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:bg-gray-800{--tw-bg-opacity:1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}}@media (min-width: 768px){.md\:mt-0{margin-top:0px}.md\:block{display:block}.md\:w-auto{width:auto}.md\:flex-row{flex-direction:row}.md\:space-x-8 > :not([hidden]) ~ :not([hidden]){--tw-space-x-reverse:0;margin-right:calc(2rem * var(--tw-space-x-reverse));margin-left:calc(2rem * calc(1 - var(--tw-space-x-reverse)))}.md\:border-0{border-width:0px}.md\:bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.md\:p-0{padding:0px}@media (prefers-color-scheme: dark){.md\:dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}}}</style></head>

  <body monica-version="2.5.0" monica-id="ofpnmcalabcbjgholdjcjblkibolbppb">
        <header>
            <nav class="bg-white border-gray-200 dark:bg-gray-900 px-4">
              <div class="w-full flex flex-wrap items-center justify-between mx-auto p-1 ">
                <a href="" class="flex-none">
                    <img id="logo" src="http://127.0.0.1:8000/../images/logo.png" class="mr-3 pl-4" width="200" height="400" alt="Findjob Logo"> <!-- Added pl-4 for left padding -->
                  </a>
                <div class="hidden w-full md:block md:w-auto " id="navbar-default">
                  <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 ">

            <!-- Home -->
        <li>
            <button class="iconHome-button pt-5">
              <i class="material-icons pb-1" style="font-size:36px;">home</i><br>
              <p class="menu pl-4 pr-4 pb-1">
                Home
                </p><div class="underline" id="match_underline_Home"></div> <!-- Added 'match-text-width' class -->
              <p></p>
            </button>
        </li>


          <!-- Notifications -->
          <li style="margin-left: 0px;">

            <button class="iconHome-button px-4 pb-7 pt-5"> <!-- Added px-4 for padding -->
              <i class="material-icons pb-1" style="font-size:36px;">notifications</i><br>
              <p class="menu pl-4 pr-4 mt-0 pb-1"> <!-- Added pl-4 and pr-4 for padding -->
                Notifications
                </p><div class="underline" id="match_underline_Notification"></div>
              <p></p>

            </button>
          </li>

        <!-- Profile -->
        <li style="margin-left: 0px;">
            <button class="iconHome-button px-4 flex flex-col items-center pb-5 pt-5"> <!-- Added "flex flex-col items-center" classes -->
                <img class="rounded-full w-8 h-8 pb-0" style="margin-bottom: 9.5px" src="http://127.0.0.1:8000/../images/ProfileIcon.jpg" alt="image description" id="ProfileIcon">
                <p class="menu pl-4 pr-4 text-center pb-1"> <!-- Added "text-center" class -->
                    Me
                    </p><div class="underline" id="match_underline_Profile"></div>
                <p></p>

            </button>
        </li>


                  </ul>
                </div>
              </div>
            </nav>

          </header>











  <div id="monica-content-root" class="monica-widget"></div></body></html>
