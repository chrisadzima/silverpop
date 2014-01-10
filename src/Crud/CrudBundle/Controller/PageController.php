<?php

namespace Crud\CrudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

function trap($var = NULL, $exit = 0, $varName = false) {
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

class PageController extends Controller {

    public function indexAction($id = null) {
        if (isset($_POST)) {
            if (isset($_POST['discount'])) {
                $em = $this->getDoctrine()->getEntityManager();
                $order = $em->getRepository('CrudCrudBundle:Order')->find($id);
                $order->setDiscount($_POST['discount']);
                $em->flush();
            }
            if (isset($_POST['deleted'])) {
                $em = $this->getDoctrine()->getEntityManager();
                $order = $em->getRepository('CrudCrudBundle:Order')->find($id);
                if (!$order) {
                    return $this->render('CrudCrudBundle:Page:blank.html.twig');
                } else {
                    $em->remove($order);
                    $em->flush();
                }
            }
            if (isset($_POST['new'])) {
                $em = $this->getDoctrine()->getEntityManager();
                $order = $em->getRepository('CrudCrudBundle:Order')->find($id);
                if (!$order) {
                    return $this->render('CrudCrudBundle:Page:blank.html.twig');
                } else {
                    $em->remove($order);
                    $em->flush();
                }
            }
        }
        if (isset($id)) {
            $em = $this->getDoctrine()->getEntityManager();

            $order = $em->getRepository('CrudCrudBundle:Order')->find($id);
            if (!$order) {
                $allOrders = $em->getRepository('CrudCrudBundle:Order')->findAll();
                //trap($allOrders);
                return $this->render('CrudCrudBundle:Page:blank.html.twig', array('orders' => $allOrders));
            } else {
                $item = $em->getRepository('CrudCrudBundle:Items')->find($order->getItemId());
                $allOrders = $em->getRepository('CrudCrudBundle:Order')->findAll();
                //trap($allOrders);
                return $this->render('CrudCrudBundle:Page:index.html.twig', array('order' => $order, 'item' => $item, 'orders' => $allOrders));
            }
        } else {
            return $this->render('CrudCrudBundle:Page:blank.html.twig');
        }
    }

}
