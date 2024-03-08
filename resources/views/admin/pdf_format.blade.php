<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <title>
        Document</title>
    <style>
        /*
        Import the desired font from Google fonts.
        */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap');

        /*
        Define all colors used in this template
        */
        :root{
            --font-color: black;
            --highlight-color: #60D0E4;
            --header-bg-color: #B8E6F1;
            --footer-bg-color: #BFC0C3;
            --table-row-separator-color: #BFC0C3;
        }

        @page{
            /*
            This CSS highlights how page sizes, margins, and margin boxes are set.
            https://docraptor.com/documentation/article/1067959-size-dimensions-orientation

            Within the page margin boxes content from running elements is used instead of a
            standard content string. The name which is passed in the element() function can
            be found in the CSS code below in a position property and is defined there by
            the running() function.
            */
            size:A4;
            margin:8cm 0 3cm 0;

            @top-left{
                content:element(header);
            }

            @bottom-left{
                content:element(footer);
            }
        }

        /*
        The body itself has no margin but a padding top & bottom 1cm and left & right 2cm.
        Additionally the default font family, size and color for the document is defined
        here.
        */
        body{
            margin:0;
            padding:1cm 2cm;
            color:var(--font-color);
            font-family: 'Montserrat', sans-serif;
            font-size:10pt;
        }

        /*
        The links in the document should not be highlighted by an different color and underline
        instead we use the color value inherit to get the current texts color.
        */
        a{
            color:inherit;
            text-decoration:none;
        }

        /*
        For the dividers in the document we use an HR element with a margin top and bottom
        of 1cm, no height and only a border top of one millimeter.
        */
        hr{
            margin:1cm 0;
            height:0;
            border:0;
            border-top:1mm solid var(--highlight-color);
        }

        /*
        The page header in our document uses the HTML HEADER element, we define a height
        of 8cm matching the margin top of the page (see @page rule) and a padding left
        and right of 2cm. We did not give the page itself a margin of 2cm to ensure that
        the background color goes to the edges of the document.

        As mentioned above in the comment for the @page the position property with the
        value running(header) makes this HTML element float into the top left page margin
        box. This page margin box repeats on every page in case we would have a multi-page
        invoice.
        */
        /**/

        /*
        Our main content is all within the HTML MAIN element. In this template this are
        two tables. The one which lists all items and the table which shows us the
        subtotal, tax and total amount.

        Both tables get the full width and collapse the border.
        */
        main table{
            width:100%;
            border-collapse:collapse;
        }

        /*
        We put the first tables headers in a THEAD element, this way they repeat on the
        next page if our table overflows to multiple pages.

        The text color gets set to the highlight color.
        */
        main table thead th{
            height:1cm;
            color:var(--highlight-color);
        }

        /*
        For the last three columns we set a fixed width of 2.5cm, so if we would change
        the documents size only the first column with the item name and description grows.
        */
        main table thead th:nth-of-type(2),
        main table thead th:nth-of-type(3),
        main table thead th:last-of-type{
            width:2.5cm;
        }

        /*
        The items itself are all with the TBODY element, each cell gets a padding top
        and bottom of 2mm.
        */
        main table tbody td{
            padding:2mm 0;
        }

        /*
        The cells in the last column (in this template the column containing the total)
        get a text align right so the text is at the end of the table.
        */
        main table thead th:last-of-type,
        main table tbody td:last-of-type{
            text-align:right;
        }

        /*
        By default text within TH elements is aligned in the center, we do not want that
        so we overwrite it with an left alignment.
        */
        main table th{
            text-align:left;
        }

        /*
        The summary table, so the table containing the subtotal, tax and total amount
        gets a width of 40% + 2cm. The plus 2cm is added because our body has a 2cm padding
        but we want our highlight color for the total row to go to the edge of the document.

        To move the table to the right side we simply set a margin-left of 60%.
        */
        main table.summary{
            width:calc(40% + 2cm);
            margin-left:60%;
            margin-top:.5cm;
        }

        /*
        The row containing the total amount gets its background color set to the highlight
        color and the font weight to bold.
        */
        main table.summary tr.total{
            font-weight:bold;
            /*background-color:var(--highlight-color);*/
        }

        /*
        The TH elements of the summary table are not on top but the cells on the left side
        these get a padding left of 1cm to give the highlight color some space.
        */
        main table.summary th{
            padding:4mm 0 4mm 1cm;
        }

        /*
        As only the highlight background color should go to the edge of the document
        but the text should still have the 2cm distance, we set the padding right to
        2cm.
        */
        main table.summary td{
            padding:4mm 10.2cm 4mm 0;
            border-bottom:0;
        }

    </style>
</head>
<body>
    <!-- In the main section the table for the separate items is added. Also, we add another table for the summary, so subtotal, tax and total amount. -->
    <main>
        <table>
            <!-- A THEAD element is used to ensure the header of the table is repeated if it consumes more than one page. -->
            <thead>
            <tr>
                <th>Item Description</th>
                <th>Rate</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <!-- The single invoice items are all within the TBODY of the table. -->
            <tbody>
                <tr>
                <td>
                    <b>{{$order->product_title}}</b>
                    <br />
                    Description
                </td>
                <td>
                    {{$order->price/$order->quantity}}
                </td>
                <td>
                    {{$order->quantity}}
                </td>
                <td>
                    {{$order->price}}
                </td>
            </tr>
            </tbody>
        </table>
        <!-- The summary table contains the subtotal, tax and total amount. -->
        <table class="summary">
            <tr>
                <th>
                    Subtotal
                </th>
                <td>
                    {{$order->price}}
                </td>
            </tr>
            <tr>
                <th>
                    <?php $tax = 3 ?>
                    Tax -{{$tax}}%
                </th>
                <td>
                    <?php
                        if ($tax>0){
                            $total_tax = $order->price*($tax/100);
                        }else{
                            $total_tax = 0;
                        }
                    ?>
                    ${{$total_tax}}
                </td>
            </tr>
            <tr>
                <th>
                    Total
                </th>
                <td>
                    ${{$order->price+$total_tax}}
                </td>
            </tr>
        </table>
    </main>
</body>
</html>