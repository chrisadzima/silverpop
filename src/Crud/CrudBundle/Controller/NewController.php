<?php

namespace Crud\CrudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crud\CrudBundle\Entity\Order;

class NewController extends Controller {
    public function trap($var = NULL, $exit = 0, $varName = false) {
    if (isset($var)) {
        echo "<pre style=\"border:1px outset;background-color:white;display:block;padding:6px;text-align:left;font:400 10pt 'courier new';\">\n";
        if ($varName) {
            echo '<span style="color:#770077;font-weight:900;">{' . $varName . '}</span>&nbsp;&nbsp;';
        }
        if (gettype($var) == 'boolean') {
            if ($var === false) {
                echo '<span style="color:blue">BOOLEAN:</span> <i style="color:green;">false</i>';
            } else {
                echo '<span style="color:blue">BOOLEAN:</span> <i style="color:green;">true</i>';
            }
        } else if (is_scalar($var)) {
            echo '<span style="color:blue">' . strtoupper(gettype($var)) . ":</span> " . $var;
        } else {
            print(htmlentities(print_r($var, true)));
        }
        echo "\r</pre>\r";
    } else {
        $varTemp = $varName ? '{' . $varName . '}' : '';
        echo '<span style="font: 14px bold sans-serif; color: red">&nbsp; ' . $varTemp . ' *** &nbsp;</span>';
    }
    
    if ($exit) {
        exit();
    }
}
    public function indexAction($id = null) {
        if(isset($_POST['date'])){
            //$this->trap($_POST);
            $order = new Order();
            $date = date("Y-m-d",strtotime($_POST['date']));
            //$this->trap($date);
            $order->setPurchaseDate(new \DateTime($date));
            $order->setItemId($_POST['item']);
            $order->setDiscount($_POST['discount']);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($order);
            $em->flush();
            $allOrders = $em->getRepository('CrudCrudBundle:Order')->findAll();
            $allItems = $em->getRepository('CrudCrudBundle:Items')->findAll();
            return $this->render('CrudCrudBundle:Page:blank.html.twig', array('orders' => $allOrders,'items'=>$allItems));
        }
        $em = $this->getDoctrine()->getEntityManager();
        $allOrders = $em->getRepository('CrudCrudBundle:Order')->findAll();
        $allItems = $em->getRepository('CrudCrudBundle:Items')->findAll();
        return $this->render('CrudCrudBundle:Page:new.html.twig', array('orders' => $allOrders,'items'=>$allItems));
    }
}
