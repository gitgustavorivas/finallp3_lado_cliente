<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left;    width: 33%">Listado de Clientes</td>
                <td style="text-align: center;    width: 34%">DEV PHP 2023</td>
                <td style="text-align: right;    width: 33%"><?php echo date('d/m/Y'); ?></td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left;    width: 50%">Leng. Prog. III</td>
                <td style="text-align: right;    width: 50%">página [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

    <br><br>
    
    <table style="width: 80%;border: solid 1px #5544DD; border-collapse: collapse" align="center">
        <thead>
            <tr>
                <th style="width: 15%; text-align: left; border: solid 1px #007500; background: #007500; text-color: #FFFFFF;"><span style="color: #FFFFFF;">FECHA</span></th>
                <th style="width: 20%; text-align: left; border: solid 1px #007500; background: #007500; text-color: #FFFFFF;"><span style="color: #FFFFFF;">HORA</span></th>
                <th style="width: 20%; text-align: left; border: solid 1px #007500; background: #007500; text-color: #FFFFFF;"><span style="color: #FFFFFF;">CLIENTE</span></th>
                <th style="width: 30%; text-align: left; border: solid 1px #007500; background: #007500; text-color: #FFFFFF;"><span style="color: #FFFFFF;">TELEFONO</span></th>
                <th style="width: 30%; text-align: left; border: solid 1px #007500; background: #007500; text-color: #FFFFFF;"><span style="color: #FFFFFF;">SERVICIO</span></th>
            </tr>
        </thead>
        <tbody>
                <?php
                foreach ($rows as $row) {
                ?>
                        <tr>
                            <td style="width: 17%; text-align: left; border: solid 1px #007500">
                                    <?=$row['fecha'] ?>
                            </td>
                            <td style="width: 20%; text-align: left; border: solid 1px #007500">
                                    <?=$row['hora'] ?>
                            </td>
                            <td style="width: 30%; text-align: left; border: solid 1px #007500">
                                    <?=$row['cliente'] ?>
                            </td>
                            <td style="width: 25%; text-align: left; border: solid 1px #007500">
                                    <?=$row['telefono'] ?>
                            </td>
                            <td style="width: 30%; text-align: left; border: solid 1px #007500">
                                    <?=$row['servicio'] ?>
                            </td>                            
                        </tr>
                <?php
                }
                ?>
        </tbody>
        <!-- <tfoot>
            <tr>
                <th style="width: 30%; text-align: left; border: solid 1px #007500; background: #CCFFCC">Fin del reporte</th>
                <th style="width: 30%; text-align: left; border: solid 1px #007500; background: #CCFFCC">Gracias!</th>
            </tr>
        </tfoot> -->
    </table>   
</page>
