<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>畢業學分檢核標準</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2; /* 表頭背景淺灰色 */
            font-weight: bold;
        }
        /* 專為 "校訂共同必修科目" 的背景設白色 */
        .main-credits-table tbody th {
            background-color: #fff;
            font-weight: bold;
        }
        ul {
            margin: 10px 0;
            padding-left: 20px;
        }
        li {
            margin-bottom: 5px;
        }
        p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="homePage.php" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">NTOU CSE</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li class="nav-item"><a class="nav-link" href="search.php">課程查詢</a></li>
                    <li class="nav-item"><a class="nav-link" href="courseTaken.php">學生已修課列表</a></li>
                    <li class="nav-item"><a class="nav-link" href="count.php">計算學分</a></li>
                    <li class="nav-item"><a class="nav-link" href="graduation.php">畢業門檻</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <!-- <a class="btn-getstarted" href="login.php">登入系統</a> -->
        </div>
    </header>
    
    <section class="hero">
    <div>
    <div class="container">
        <h1>畢業學分檢核標準(111年度資工系入學學生)</h1>
        

        <h3>畢業學分規定</h3>
        <p>學生需修習以下學分要求方可畢業：</p>
        <table class="main-credits-table">
            <thead>
                <tr>
                    <th>科目</th>
                    <th>學分數</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>校訂共同必修科目</th>
                    <td>28 學分</td>
                </tr>
                <tr>
                    <th>系訂必修科目</th>
                    <td>53 學分</td>
                </tr>
                <tr>
                    <th>選修科目</th>
                    <td>54 學分</td>
                </tr>
                <tr>
                    <th>所有科目總計</th>
                    <td>至少 135 學分</td>
                </tr>
            </tbody>
        </table>
        <br><hr>
        <h3>學分抵免認定</h3>
        <h4>一、必修課程的抵免規定</h4>
        <p>以下課程必須在本系修習完畢，不得至其他科系修習：</p>
        <table>
            <thead>
                <tr>
                    <th>課程名稱</th>
                    <th>學分數</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>程式設計</td><td>3</td></tr>
                <tr><td>程式設計(二)</td><td>3</td></tr>
                <tr><td>計算機概論</td><td>3</td></tr>
                <tr><td>資料結構</td><td>3</td></tr>
                <tr><td>演算法</td><td>3</td></tr>
                <tr><td>數位邏輯</td><td>3</td></tr>
                <tr><td>數位邏輯實驗</td><td>1</td></tr>
                <tr><td>計算機組織學</td><td>3</td></tr>
                <tr><td>作業系統</td><td>3</td></tr>
                <tr><td>電腦網路</td><td>3</td></tr>
            </tbody>
        </table>
        <br>
        <p>以下課程第一次需在本系修習，若未通過，可至本校電資學院及工學院修課：</p>
        <table>
            <thead>
                <tr>
                    <th>課程名稱</th>
                    <th>學分數</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>離散數學</td><td>3</td></tr>
                <tr><td>普通物理</td><td>3</td></tr>
                <tr><td>微積分</td><td>6</td></tr>
                <tr><td>線性代數</td><td>3</td></tr>
                <tr><td>機率論</td><td>3</td></tr>
            </tbody>
        </table>

        <h4>二、選修課程規定</h4>
        <p>選修課程分為「系內選修」與「系外選修」：</p>
        <p>(一) 系內選修科目：至少需修滿 43 學分，其中核心選修科目至少修滿 12 學分</p>
  
        <ol>
            <li>資工系所開設或認可之選修課。</li>
            <li>軟工學程、RFID 學程、3D 多媒體學程、物聯網學程（不限學分數）。</li>
            <li>
                海洋事務與資源管理學程（必修課程、海洋基礎科學相關課程、海洋資源與保育相關課程），
                可列為系內選修，以兩門課為限，學分可以兩用。
            </li>
            <li>
                地理資訊應用學程（兩門為限），『計算機概論、資料庫系統、程式設計』不予採計。
            </li>
            <li>電資學院非上述學程之課程以 6 學分為上限。</li>
        </ol>
        
        <p>(二) 系外選修科目</p>
        <ol>
            <li>已抵用之學程、輔系、或必修學分不得再列入系外選修科目。</li>
            <li>外系所有必選修課程。</li>
            <li>系內選修。</li>
            <li>
                電子商務學程課程（不限學分數，但『電腦概論、網頁設計與實作、網際網路與伺服器管理、
                資料庫系統導論』不列入畢業學分）。
            </li>
            <li>共同教育課程至多抵免 8 學分。</li>
        </ol>
        <br>
        
        <h4>三、校訂共同必修課程規定</h4>
        <p>校訂共同必修課程分為「國文」、「英文」、「大一博雅必修」、「博雅八大領域」：</p>
        <table>
            <thead>
                <tr>
                    <th>領域名稱</th>
                    <th>學分數</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>國文</td>
                    <td><strong>需取得國文領域必修4學分</strong>
                        <table style="width: 50%; margin: 0 auto; border-collapse: collapse; text-align: center;">
                            <tbody>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">國文(上)(國文領域)：2學分</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">國文(下)(國文領域)：2學分</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>英文</td>
                    <td ><strong>需取得英文領域6學分</strong>
                        <table style="width: 50%; margin: 0 auto; border-collapse: collapse; text-align: center;">
                            <tbody>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">大一英文：上、下學期各 2 學分，共 4 學分</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">大二「進階英文」：2 學分，大二以上始可修</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>大一博雅必修</td>
                    <td><strong>需取得大一博雅必修4學分</strong>
                        <table style="width: 50%; margin: 0 auto; border-collapse: collapse; text-align: center;">
                            <tbody>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">人工智慧概論：2學分</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">海洋科學概論：2學分</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>博雅八大領域</td>
                    <td><strong>需取得博雅八大領域14學分(每領域最多採計4學分)</strong>
                    <table style="width: 50%; margin: 0 auto; border-collapse: collapse; text-align: center;">
                        <tbody>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;">人格培育與多元文化</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;">民主法治與公民意識</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;">全球化與社經結構</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;">中外經典</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;">美學與美感表達</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;">科技與社會</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;">自然科學</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;">歷史分析與詮釋</td>
                            </tr>
                        </tbody>
                    </table>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <br><hr>
        <h3>其他規定</h3>
        <ul>
            <li>三年級下學期須修「資工系專題(一)」、四年級上學期修「資工系專題(二)」，學生得以依據個人的興趣專長選課。</li>
            <li>程式設計達 50 分，始可修程式設計(二)。</li>
            <li>程式設計或程式設計(二)達 50 分，始可修資料結構。</li>
            <li>大學部學生選修研究所課程若計入畢業學分，不可抵免研究所課程。</li>
        </ul>
        <br><hr>
        <h3>備註</h3>
        <ul>
            <li>如有未盡事宜，依據本校「學生選課辦法」及相關規定辦理。</li>
            <li>
                參考依據： 
                <a href="https://cse.ntou.edu.tw/var/file/63/1063/attach/60/pta_44720_3805145_46451.pdf" target="_blank">
                    國立臺灣海洋大學資訊工程學系111年度大學部學生修業規定
                </a>
            </li>
        </ul>
    </div>
    <div>
    </section>
</body>
</html>
