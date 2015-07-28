<?php
/*
����ģʽ��
�򵥵�˵��һ������ֻ����һ���ض�������
�����ࣺ
1�����캯����Ҫ���Ϊprivate�����ʿ��ƣ���ֹ�ⲿ����ʹ��new�������������󣩣������಻������������ʵ������ֻ�ܱ�������ʵ������
2��ӵ��һ���������ʵ���ľ�̬��Ա����
3��ӵ��һ���������ʵ���Ĺ����ľ�̬����������getInstance()��������ʵ���������࣬ͨ��instanceof���������Լ�⵽���Ƿ��Ѿ���ʵ������
4����Ҫ����__clone()������ֹ���󱻸��ƣ���¡��
ΪʲôҪʹ��PHP����ģʽ��
1��php��Ӧ����Ҫ�������ݿ�Ӧ��, ����һ��Ӧ���л���ڴ��������ݿ����, ʹ�õ���ģʽ, ����Ա��������new �������ĵ���Դ��
2�����ϵͳ����Ҫ��һ������ȫ�ֿ���ĳЩ������Ϣ, ��ôʹ�õ���ģʽ���Ժܷ����ʵ��. ������Բο�ZF��FrontController���֡�
3����һ��ҳ��������, ���ڽ��е���, ��Ϊ���еĴ���(�������ݿ������db)��������һ������, ���ǿ������������ù���, �����־���Ӷ����⵽��var_dump, echo��
*/

class Single
{
    //������ʵ���ľ�̬��Ա����
    private static $_instance;
     
    //private��ǵĹ��췽��
    private function __construct()
    {
        //echo 'This is a Constructed method;';
    }
    
    //����__clone������ֹ���󱻸��ƿ�¡
    public function __clone()
    {
        /*
         * trigger_error() ���������û�����Ĵ�����Ϣ��
         * trigger_error() �������û�ָ���������´���һ��������Ϣ��
         * �����ڽ��Ĵ�������һͬʹ�ã�Ҳ�������� set_error_handler() 
         * �����������û��Զ��庯��ʹ�á�
         */
        trigger_error('Clone is not allow!',E_USER_ERROR);
    }
    
    //��������,���ڷ���ʵ���Ĺ����ľ�̬����
    public static function getInstance()
    {
        if(!(self::$_instance instanceof self))
        {
            self::$_instance = new self;
        }
        return self::$_instance;
    }
     
    public function test()
    {
        echo '���÷����ɹ�';
    }
}

//��newʵ����private��ǹ��캯������ᱨ��
//$ins = new Single();
 
//��ȷ����,��˫ð��::���������ʾ�̬������ȡʵ��
$ins = Single::getInstance();
$ins->test();

//����(��¡)���󽫵���һ��E_USER_ERROR
$ins_clone = clone $ins;

echo "You will not see me!";