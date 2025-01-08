<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Challenges</title>
    <style>
        /* إعدادات الصفحة */
        body {
            background-color: black; /* خلفية سوداء */
            color: #00FF00; /* كتابة خضراء */
            font-family: monospace; /* خط يشبه الكود */
            text-align: center; /* تنسيق النص */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column; /* وضع العناصر عمودياً */
            justify-content: center; /* توسيط العناصر */
            align-items: center; /* توسيط العناصر أفقياً */
            height: 100vh;
        }

        /* تنسيق عنوان التحديات */
        h1 {
            margin-bottom: 20px;
        }

        /* تنسيق قائمة المستويات */
        ul {
            list-style: none;
            padding: 0;
        }

        /* تنسيق عناصر القائمة */
        li {
            margin: 10px 0;
            font-size: 20px;
        }

        /* تنسيق الروابط */
        a {
            color: #00FF00;
            text-decoration: none;
        }

        /* تغيير لون الرابط عند التمرير عليه */
        a:hover {
            color: #007700;
        }

        /* تنسيق الجمجمة */
        .matrix {
            line-height: 1.1; /* تباعد بين الأسطر */
            white-space: pre; /* الحفاظ على تنسيق النص */
            font-size: 16px; /* حجم النص */
            margin-top: 20px; /* ترك مسافة أعلى الجمجمة */
        }
    </style>
</head>
<body>
    <!-- عنوان التحديات -->
    <h1>XSS Challenges</h1>

    <!-- قائمة المستويات -->
    <ul>
        <li><a href="level1.html">Level 1: Reflected XSS</a> <span id="status1"></span></li>
        <li><a href="level2.html">Level 2: DOM-Based XSS</a> <span id="status2"></span></li>
        <li><a href="level3.html">Level 3: Stored XSS</a> <span id="status3"></span></li>
        <li><a href="level4.html">Level 4: XSS in Event Handlers</a> <span id="status4"></span></li>
        <li><a href="level5.html">Level 5: Unsafe Attributes (IMG onerror)</a> <span id="status5"></span></li>
        <li><a href="level6.html">Level 6: JavaScript URL Injection</a> <span id="status6"></span></li>
        <li><a href="XSS">Som of challanges</a> <span id="status7"></span></li>

        <!-- أضف المزيد من المستويات هنا -->
    </ul>

    <!-- عنصر يحتوي على الجمجمة -->
    <div id="skull" class="matrix"></div>

    <!-- سكربت الجمجمة -->
    <script>
        // مصفوفة تمثل الجمجمة باستخدام الأرقام 0 و 1
        const skull = [
            "0000000001111111111110000000000",
            "0000001111111111111111110000000",
            "0000111111111111111111111100000",
            "0001111111001111111110011110000",
            "0011111110001111111100011111000",
            "0111111110001111111100011111100",
            "1111111111001111111110011111110",
            "1111111111111111111111111111110",
            "1111111111111111111111111111110",
            "1111100001111111111110000011110",
            "0111000000011111111100000001110",
            "0110000000001111111000000000110",
            "0000000000000111110000000000000",
            "0000000000000011100000000000000",
            "0000000000000011100000000000000",
            "0000000000000111110000000000000",
            "0111000000001111111100000001110",
            "1111100001111111111110000011110",
            "1111111111111111111111111111110",
            "1111111111111111111111111111110",
            "0111111111111111111111111111110",
            "0011111111111111111111111111100",
            "0001111111111111111111111111000",
            "0000111111111111111111111110000",
            "0000001111111111111111111000000",
            "0000000011111111111110000000000"
        ];

        // تحديد العنصر الذي ستُطبع فيه الجمجمة
        const skullElement = document.getElementById('skull');

        // وظيفة لعرض الجمجمة على الصفحة
        function renderSkull() {
            let renderedSkull = ""; // النص النهائي لرسم الجمجمة

            // المرور على كل سطر في المصفوفة
            skull.forEach((line) => {
                // استبدال بعض الأرقام 0 و 1 بشكل عشوائي لجعلها تتحرك
                let dynamicLine = line.replace(/./g, (char) => {
                    // إذا كان الرقم 1 أو 0، قم بإضافة لمسة عشوائية لتأثير الحركة
                    if (Math.random() > 0.9) {
                        return char === "1" ? "0" : "1"; // تبديل بين 0 و 1
                    }
                    return char;
                });

                // إضافة السطر الديناميكي مع الانتقال إلى السطر التالي
                renderedSkull += dynamicLine + "\n";
            });

            // عرض الجمجمة في العنصر
            skullElement.textContent = renderedSkull;
        }

        // استدعاء وظيفة رسم الجمجمة كل 200 ميلي ثانية (ديناميكية)
        setInterval(renderSkull, 200);

        // استدعاء أولي لرسم الجمجمة عند تحميل الصفحة
        renderSkull();
    </script>

    <!-- سكربت لتحديث حالة التحديات -->
    <script>
        // جلب حالة المستويات من localStorage
        const completedLevels = JSON.parse(localStorage.getItem('completedLevels')) || {};

        // تحديث الحالات بناءً على البيانات المخزنة
        Object.keys(completedLevels).forEach(level => {
            if (completedLevels[level]) {
                document.getElementById(`status${level}`).textContent = "✔️";
            }
        });
    </script>
</body>
</html>


